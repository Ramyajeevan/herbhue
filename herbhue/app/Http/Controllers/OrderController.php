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
    

    $msg="";
    if(!isset($request->address_id))
    {
      
      $firstname=$request->firstname;
      $lastname=$request->lastname;
      $street_address=$request->street_address;
      $street_address2=$request->street_address2;

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
    else
    {
      //shipping address
      if(isset($request->address_id))
      {
        $address_id=$request->address_id;
        
      }
    
      //billing address
      if(!isset($request->billing_address))
      {
        $address=DB::table("tbl_address")->where("id",$address_id)->first();
        $billing_firstname=$address->firstname;
        $billing_lastname=$address->lastname;
        $billing_street_address=$address->street_address;
        $billing_street_address2=$address->street_address2;
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
        $billing_city=$request->billing_city;
        $billing_pincode=$request->billing_pincode;
        $billing_phone=$request->billing_phone;
        if($billing_firstname=="")
        {
          $msg.="<strong>First name</strong> for billing is a required field.<br>";
        }
        if($billing_lastname=="")
        {
          $msg.="<strong>Last name</strong>  for billing  is a required field.<br>";
        }
        if($billing_street_address=="")
        {
          $msg.="<strong>Street address</strong>  for billing  is a required field.<br>";
        }
        if($billing_city=="")
        {
          $msg.="<strong>City</strong>  for billing  is a required field.<br>";
        }
        if($billing_pincode=="")
        {
          $msg.="<strong>Pincode</strong>  for billing  is a required field.<br>";
        }
        if($billing_phone=="")
        {
          $msg.="<strong>Phone</strong>  for billing  is a required field.<br>";
        }
      }
      // card details
      if($request->cardnumber=="")
      {
        $msg.="<strong>Card Number</strong> is a required field.<br>";
      }
      if($request->expire_month=="")
      {
        $msg.="<strong>Expire month of Card Number</strong> is a required field.<br>";
      }
      if($request->expire_year=="")
      {
        $msg.="<strong>Expire year of Card Number</strong> is a required field.<br>";
      }
      if($request->cvv=="")
      {
        $msg.="<strong>Cvv of Card Number</strong> is a required field.<br>";
      }
      if(!isset($request->privacy))
      {
        $msg.="Please check the <strong>Privacy Policy</strong>.<br>";
      }
      if($msg=="")
      {
         //adding shipping address
        if(!isset($request->address_id))
        {
           
            $email=Session::get('username');
            $user=DB::table('tbl_user')->where("email",$email)->first();
             $address_id=DB::table('tbl_address')->insertGetId([
               'user_id'=>$user->id,
               'firstname' => $firstname, 
              'lastname' => $lastname, 
               'street_address' => $street_address,
              'street_address2' => $street_address2,
               'city'=> $city,
               'pincode'=>$pincode,
               'phone'=>$phone
              ]);
        }
        else
        {
          $address_id=$request->address_id;
        }

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
              'address_id'=>$address_id
           ]);
          
         $billing=DB::table('tbl_billing_address')->insert([
              'order_id'=>$order_id,
              'user_id'=>$user->id,
               'billing_firstname' => $billing_firstname, 
             'billing_lastname' => $billing_lastname, 
               'billing_street_address' => $billing_street_address,
             'billing_street_address2' => $billing_street_address2,
                'billing_pincode'=>$billing_pincode,
               'billing_city'=>$billing_city,
               'billing_phone'=>$billing_phone
           ]);
   
        Cart::where("session_id",$session_id)->delete();
          //Payment starts here
          DB::table('tbl_order')
          ->where("order_id",$order_id)
          ->update(['payment_method'=>$request->card_type,'cardnumber'=>$request->cardnumber,
          'expire_month'=>$request->expire_month,'expire_year'=>$request->expire_year,
          'cvv'=>$request->cvv]);
          
           //send email for order placed
    $email=Session::get('username');
    $order=DB::table('tbl_order')->where("order_id",$order_id)->first();
    $order_products=DB::table("tbl_order_products")->where("order_id",$order_id)->get();
    for($i=0;$i<count($order_products);$i++)
    {
          $productdetail=DB::table("tbl_product")->where("id",$order_products[$i]->product_id)->first();
          if(isset($productdetail))
          {
          $order_products[$i]->product_name=$productdetail->name;
          $order_products[$i]->image1=$productdetail->image1;
          }
          else
          {
              $order_products[$i]->product_name="";
              $order_products[$i]->image1="";
          }
    }
    $billing=DB::table("tbl_billing_address")->where("order_id",$order_id)->first();
    $shipping=DB::table("tbl_address")->where("id",$order->address_id)->first();
    $content='<h4 class="text-black my-4">View Order '.$order->order_id.'</h4><p>Order Number : <strong>'.$order->order_id.'</strong><br>';
    $content.='Date : <strong>'.$order->added_date.'</strong><br>Payment Method : <strong>'.$order->payment_method.'</strong><br></p>';
    $content.='<h3 class="section-title section-title__sm mb-2 pb-2 font-size-18">Order details</h3><table class="table m-3"><thead>';
    $content.='<tr><th class="product-name">Product</th><th class="product-subtotal">Total</th></tr></thead><tbody>';
    if(count($order_products)>0)
    {
        foreach($order_products as $ord_prod)
        {
          $content.='<tr><td>'.$ord_prod->product_name .' x '. $ord_prod->quantity.'</td><td>&pound; '. $ord_prod->total.'</td></tr>';
        }
    }
    $content.='<tr><td>Sub Total</td><td>&pound; '.$order->subtotal.'</td></tr><tr><td>Delivery Charge</td><td>&pound; '.$order->delivery_charge.'</td></tr>';
    if($order->coupon_amount>0)
    {
        $content.='<tr><td>Coupon Amount</td><td>&pound; '.$order->coupon_amount.'</td></tr>';
    }

    $content.='<tr><td>Total</td><td>&pound; '.$order->total.'</td></tr></tbody></table>';
    $content.='<table><tr><th><h3 class="section-title section-title__sm mb-2 pb-2 font-size-18">Billing Address</h3></th></tr>';
    $content.='<tr><td>'.$billing->billing_firstname .' '.$billing->billing_lastname .'<br>'. $billing->billing_street_address .'<br>';
    $content.= $billing->billing_street_address2.'<br>'.$billing->billing_city.'<br>'. $billing->billing_pincode.'<br>';
    $content.=$billing->billing_phone.'</td><tr></table>';
    $user=DB::table('tbl_user')->where("email",$email)->first();
    $mail_sent = Parent::sendmail($content, env('APP_NAME').' Order Placed', env('MAIL_USERNAME'), env('APP_NAME'),$email,$user->name);
    
          require '../vendor/autoload.php';
          require_once('../vendor/stripe/stripe-php/init.php');
         $stripe = new \Stripe\StripeClient('sk_test_51O5pJDL5fakvGlAxziOdJArTdmG6JrwbxKiAp2cOl4Bkr1NmupQ2DYDulBakyvfs3cycTRI1kL3AvGhqqdzqWCOY00gC0RZkXy');

    $checkout_session = $stripe->checkout->sessions->create([
      'line_items' => [[
        'price_data' => [
          'currency' => 'GBP',
          'product_data' => [
            'name' => 'Herbhue',
          ],
          'unit_amount' => $net_total*100,
        ],
        'quantity' => 1,
      ]],
       'automatic_tax' => ['enabled' => true],
  'mode' => 'payment',
      'success_url' => 'https://herbhue.azurewebsites.net/thankyou/{CHECKOUT_SESSION_ID}/'.$order_id,
      'cancel_url' => 'https://herbhue.azurewebsites.net/cancel',
    ]);
   
    return redirect($checkout_session->url);
       // return redirect()->route('thankyou', [$order_id]);

      }
      else
      {
        return redirect()->back()->with('errors',$msg);
      }
      
         
    }

  }
 
  public function thankyou($session_id,$order_id)
  {
    if(!empty(Session::get('coupon_code')))
    {
      Session::forget('coupon_code');
      Session::forget('coupon_amount');
    }
    $order=DB::table('tbl_order')->where("order_id",$order_id)->first();
    $order_amount=$order->total;
    require '../vendor/autoload.php';
      require_once('../vendor/stripe/stripe-php/init.php');
$stripe = new \Stripe\StripeClient('sk_test_51O5pJDL5fakvGlAxziOdJArTdmG6JrwbxKiAp2cOl4Bkr1NmupQ2DYDulBakyvfs3cycTRI1kL3AvGhqqdzqWCOY00gC0RZkXy');

try {
  $session = $stripe->checkout->sessions->retrieve($session_id);
  $customer = $session->customer_details;
     DB::table('tbl_order')->where("order_id",$order_id)->update(['payment_status'=>$session->payment_status,'payment_id'=>$session->payment_intent]);
  return view('thankyou',['order_id'=>$order_id,'order_amount'=>$order_amount]);
} catch (Error $e) {
  http_response_code(500);
  echo json_encode(['error' => $e->getMessage()]);
}
   
    
  }

  
}
?>
