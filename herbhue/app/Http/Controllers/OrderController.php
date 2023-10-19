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

class OrderController extends Controller
{
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
 	      return redirect()->route('shipping');
      }
      // return redirect()->route('productshipping');
  }
  public function shipping()
  {
    $user=DB::table('tbl_user')->where("email",Session::get('username'))->first();
    $address_id=Session::get('address_id');
    $address=DB::table("tbl_address")->where("id",$address_id)->first();
    
     $session_id=Session::getId();
      $cart_option=DB::table("tbl_cart")->where("session_id",$session_id)->get();
      $cart=DB::table("tbl_cart")->select(DB::raw('SUM(quantity) as total_quantity'),DB::raw('SUM(total_price) as price'))->where("session_id",$session_id)->first();
      $shipping_amount=DB::table("tbl_shipping")->where("id","1")->first();

      return view('shipping', ['address' => $address,'address_id'=>$address_id,'cart_option'=>$cart_option,'cart'=>$cart,'shipping_amount'=>$shipping_amount]);
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
}
?>