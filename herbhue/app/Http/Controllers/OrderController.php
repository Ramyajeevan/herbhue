<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use DB;
use Hash;

class OrderController extends Controller
{
 public function placeorder1(Request $request)
  {
     // dd($request);
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
	  $billing_email=Session::get('username');
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
      $billing_email=$request->billing_email;
    }
   // dd($billing_firstname);
   $payment_method=$request->payment_method;
    //place the order now
    $email=Session::get('username');
     $user=User::where("email",$email)->first();
     $order_id="GEMF-ORD".rand(10000,99999);
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
       $order_products=DB::table('tbl_order_products')->insert([
         	'order_id'=>$order_id,
          	'product_id' => $product_id, 
            'quantity' => $quantity,
          	'price'=>$price,
          	'total'=>$total
	      ]);
     }
     $net_total=0;
     $email=Session::get('username');
     $user=DB::table('tbl_user')->where("email",$email)->first();
     $delivery=DB::table('tbl_shipping')->where("id","1")->first();
     $delivery_charge=$delivery->amount;
     $coupon_amount=0;
     if(!empty(Session::get('coupon_code'))) $coupon_amount=Session::get('coupon_amount'); 
     $net_total=$subtotal+$delivery_charge-$coupon_amount;
     $order=DB::table('tbl_order')->insert([
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
          	'billing_phone'=>$billing_phone,
        	'billing_email'=>$billing_email
	      ]);

     Cart::where("session_id",$session_id)->delete();
     return redirect()->route('thankyou', [$order_id]);
    //return redirect()->route('thankyou', ['order_id'=>$order_id]);
  }
  
  
  public function placeorder(Request $request)
  {
    //dd($request);
    $msg="";
    if(!isset($request->address_id))
    {
      
      $shipping_firstname=$request->firstname;
      $shipping_lastname=$request->lastname;
      $shipping_street_address=$request->street_address;
      $shipping_street_address2=$request->street_address2;
      $shipping_state=$request->state;
      $shipping_city=$request->city;
      $shipping_pincode=$request->pincode;
      $shipping_phone=$request->phone;

        if($shipping_firstname=="")
        {
          $msg.="<strong>First name</strong> is a required field.<br>";
        }
        if($shipping_lastname=="")
        {
          $msg.="<strong>Last name</strong> is a required field.<br>";
        }
        if($shipping_street_address=="")
        {
          $msg.="<strong>Street address</strong> is a required field.<br>";
        }
        if($shipping_state=="")
        {
          $msg.="<strong>State</strong> is a required field.<br>";
        }
        if($shipping_city=="")
        {
          $msg.="<strong>City</strong> is a required field.<br>";
        }
        if($shipping_pincode=="")
        {
          $msg.="<strong>Pincode</strong> is a required field.<br>";
        }
        if($shipping_phone=="")
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
             'firstname' => $shipping_firstname, 
            'lastname' => $shipping_lastname, 
             'street_address' => $shipping_street_address,
            'street_address2' => $shipping_street_address2,
             'state'=> $shipping_state,
             'city'=> $shipping_city,
             'pincode'=>$shipping_pincode,
             'phone'=>$shipping_phone
            ]);
        }
        session()->put('address_id',$address_id);
 	    return redirect()->route('payment');
      }
      // return redirect()->route('productshipping');
    }
  public function payment()
  {
    $user=DB::table('tbl_user')->where("email",Session::get('username'))->first();
    $address_id=Session::get('address_id');
    $address=DB::table("tbl_address")->where("id",$address_id)->first();
    
     $session_id=Session::getId();
      $cart_option=DB::table("tbl_cart")->where("session_id",$session_id)->get();
      $cart=DB::table("tbl_cart")->select(DB::raw('SUM(quantity) as total_quantity'),DB::raw('SUM(total_price) as price'))->where("session_id",$session_id)->first();
      $shipping_amount=DB::table("tbl_shipping")->where("id","1")->first();

      return view('payment', ['address' => $address,'address_id'=>$address_id,'cart_option'=>$cart_option,'cart'=>$cart,'shipping_amount'=>$shipping_amount]);
      

  }

  public function payment_order(Request $request)
  {
    $order=DB::table('tbl_order')
              ->where("id",Session::get('orderid'))
              ->update(['payment_method'=>$request->payment_method]);
    return redirect()->route('thankyou', [Session::get('orderid')]);
  }
       
  public function thankyou($order_id)
  {
      
      $order=DB::table("tbl_order")->where("order_id",$order_id)->first();
      $billing=DB::table("tbl_billing_address")->where("order_id",$order_id)->first();
      $order_products=DB::table("tbl_order_products")->where("order_id",$order_id)->get();

    $address=DB::table('tbl_address')->where("id",$order->address_id)->first();
   
    return view('thankyou',['order_id'=>$order_id,'order_products'=>$order_products,'order'=>$order,'address'=>$address,'billing'=>$billing]);
    
  }
  public function validatepincode(Request $request)
  {
    $pincode=$request->pincode;
    $user_pincode=DB::table('tbl_pincode')->where("pincode",$pincode)->first();
    if(!isset($user_pincode))
    {
      echo "It is not our deliverable pincode ";
      exit;
    }
    else
    {
      echo "It is our deliverable pincode ";
      exit;
    }
  }
}
?>