<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;


use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use DB;
use App\Repositories\OrderRepository;
class OrderController extends Controller
{
  protected $orderRepository;

  public function __construct(OrderRepository $orderRepository)
  {
      $this->orderRepository = $orderRepository;
  }


  public function placeorder(Request $request)
  {
    //dd($request); 
    $msg="";
    if(!isset($request->address_id))
    {
      
      $firstname=$request->firstname;
      $lastname=$request->lastname;
      $street_address=$request->street_address;
      $street_address2=$request->street_address2;
      $state=$request->state;
      $city=$request->city;
      $pincode=$request->pincode;
      $phone=$request->phone;

        if($firstname=="")
        {
          $msg.="<strong>First name</strong> is a required field.<br>";
        }
        if($lastname=="")
        {
          $msg.="<strong>Last name</strong> is a required field.<br>";
        }
        if($street_address=="")
        {
          $msg.="<strong>Street address</strong> is a required field.<br>";
        }
        if($state=="")
        {
          $msg.="<strong>State</strong> is a required field.<br>";
        }
        if($city=="")
        {
          $msg.="<strong>City</strong> is a required field.<br>";
        }
        if($pincode=="")
        {
          $msg.="<strong>Pincode</strong> is a required field.<br>";
        }
        if($phone=="")
        {
          $msg.="<strong>Phone</strong> is a required field.<br>";
        }
    }  
    if($msg!="")
      {
           return redirect()->back()->with('errors',$msg);
      }
      else
      {
        if(isset($request->address_id))
        {
        	$address_id=$request->address_id;
          
        }
        else
        {
           $email=Session::get('username');
     	   $user=DB::table('tbl_user')->where("email",$email)->first();
           $address_id=DB::table('tbl_address')->insertGetId([
             'user_id'=>$user->id,
             'firstname' => $firstname, 
            'lastname' => $lastname, 
             'street_address' => $street_address,
            'street_address2' => $street_address2,
             'state'=> $state,
             'city'=> $city,
             'pincode'=>$pincode,
             'phone'=>$phone
            ]);
        }
        
        session()->put('address_id',$address_id);
       // print_r(session()->all());exit;
 	      return redirect()->route('payment');
      }
      // return redirect()->route('productshipping');
  }
  public function payment()
  {
    
    $address_id=Session::get('address_id');
    $address=DB::table("tbl_address")->where("id",$address_id)->first();
    $session_id=Session::getId();
     // $cart=$this->orderRepository->showcart($session_id);
     // echo "<pre>";print_r($cart);echo "</pre>";
      $cart_total=$this->orderRepository->getCartTotal($session_id);
      $cart_total_mrp=$this->orderRepository->getCartTotalMrp($session_id);

      return view('payment', ['address' => $address,'address_id'=>$address_id,'cart_total'=>$cart_total,'cart_total_mrp'=>$cart_total_mrp]);
  } 
  public function thankyou($order_id)
  {
    if(!empty(Session::get('coupon_code')))
    {
      Session::forget('coupon_code');
      Session::forget('coupon_amount');
    }
    return view('thankyou',['order_id'=>$order_id]);
    
  }

  public function placeorder1(Request $request)
  {

     
    $address_id=$request->address_id;
    if($request->billing_address=="same")
    {
       $address=DB::table("tbl_address")->where("id",$address_id)->first();
      $billing_firstname=$address->firstname;
      $billing_lastname=$address->lastname;
      $billing_street_address=$address->street_address;
      $billing_street_address2=$address->street_address2;
      $billing_state=$address->state;
      $billing_city=$address->city;
      $billing_pincode=$address->pincode;
      $billing_phone=$address->phone;
	  }
    else
    {
      $billing_firstname=$request->billing_firstname;
      $billing_lastname=$request->billing_lastname;
      $billing_street_address=$request->billing_street_address;
      $billing_street_address2=$request->billing_street_address2;
      $billing_state=$request->billing_state;
      $billing_city=$request->billing_city;
      $billing_pincode=$request->billing_pincode;
      $billing_phone=$request->billing_phone;
    }
   // dd($billing_firstname);
   $payment_method=$request->payment_method;
    //place the order now
    
     $order_id="HH-ORD_".rand(10000,99999);
     $subtotal=0;
     $session_id=Session::getId();
     $cart = Cart::where("session_id",$session_id)->get();
     for($i=0;$i<count($cart);$i++)
     {
       $product_id=$cart[$i]->product_id;
       $quantity=$cart[$i]->quantity;
       $price=$cart[$i]->unit_price;
       $total=$cart[$i]->total_price;
       $subtotal+=$total;
       $product_options=DB::table("tbl_product_options")->where("id",$cart[$i]->option_id)->first();
       $order_products=DB::table('tbl_order_products')->insert([
         	'order_id'=>$order_id,
         	'option_id'=>$product_options->id,
          	'product_id' => $product_id, 
            'quantity' => $quantity,
          	'price'=>$price,
          	'total'=>$total
	      ]);
     }
     $net_total=0;
        
     $delivery_charge=0;
     $coupon_amount=0;
     if(!empty(Session::get('coupon_code'))) $coupon_amount=Session::get('coupon_amount'); 
     $net_total=$subtotal+$delivery_charge-$coupon_amount;
     $email=Session::get('username');
     $user=DB::table('tbl_user')->where("email",$email)->first();
     $order_id_payment=DB::table('tbl_order')->insertGetId([
         	'order_id'=>$order_id,
       		'user_id'=>$user->id,
          	'subtotal' => $subtotal, 
            'delivery_charge' => $delivery_charge,
          	'coupon_amount'=>$coupon_amount,
          	'total'=>$net_total,
       		'address_id'=>$address_id,
          	'payment_method'=>$payment_method
	      ]);
       
      $billing=DB::table('tbl_billing_address')->insert([
         	'order_id'=>$order_id,
       		'user_id'=>$user->id,
          	'billing_firstname' => $billing_firstname, 
        	'billing_lastname' => $billing_lastname, 
            'billing_street_address' => $billing_street_address,
        	'billing_street_address2' => $billing_street_address2,
            'billing_state'=>$billing_state,
            'billing_pincode'=>$billing_pincode,
          	'billing_city'=>$billing_city,
          	'billing_phone'=>$billing_phone
	      ]);

     Cart::where("session_id",$session_id)->delete();
       //Payment starts here
    
        if($payment_method=="cod")
        {
             DB::table('tbl_order')
              ->where("order_id",$order_id)
              ->update(['payment_method'=>$payment_method]);
            return redirect()->route('thankyou', [$order_id]);
        }
        else
        {
           
        
          DB::table('tbl_order')
          ->where("order_id",$order_id)
          ->update(['payment_method'=>$payment_method]);
        return redirect()->route('thankyou', [$order_id]);
       
        }
     //payment ends here
    // return redirect()->route('thankyou', ["$order_id"]);
  }
}
?>