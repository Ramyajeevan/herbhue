<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Cart;
use DB;


class CartController extends Controller
{

  
    public function addtocart(Request $request)
    {
    $product_id=$request->product_id;
    $product=Product::find($product_id);
    $product_id=$product->id;
    $session_id=Session::getId();
    $quantity=$request->quantity;
    $price=$product->selling_price;
    $total=$quantity*$price;
    if(empty(Session::get('username')))
      $user_id=0;
    else
    {
        $user=DB::table('tbl_user')->where("email",Session::get('username'))->first();
        $user_id=$user->id;
    }
      $id = DB::table('tbl_cart')->insertGetId([
          'product_id' => $product_id, 
          'quantity' => $quantity,
          'unit_price'=>$price,
          'total_price'=>$total,
        'user_id'=> $user_id,
          'session_id'=>$session_id
      ]);
    echo "Product added to cart successfully";
    exit;
    
    }
  	
  	public function incrementvalue(Request $request)
    {
       $product_id=$request->product_id;
      $product=Product::find($product_id);
      $session_id=Session::getId();
      $quantity=$request->quantity;
      $price=$product->selling_price;
      $total=$quantity*$price;
      $id = DB::table('tbl_cart')->where("session_id",$session_id)->where("product_id",$product_id)->update(['quantity' => $quantity,'unit_price'=>$price,'total_price'=>$total]);
      echo "Product added to cart successfully";
      exit;
      
    }
  	
    public function decrementvalue(Request $request)
    {
      $product_id=$request->product_id;
      $product=Product::find($product_id);
      $session_id=Session::getId();
      $quantity=$request->quantity;
      $price=$product->selling_price;
      $total=$quantity*$price;
      $id = DB::table('tbl_cart')->where("session_id",$session_id)->where("product_id",$product_id)->update(['quantity' => $quantity,'unit_price'=>$price,'total_price'=>$total]);
      echo "Product updated to cart successfully";
      exit;
      
    }
  
  	public function deletecart(Request $request)
    {
      $cartid=$request->cartid;
      $cart=Cart::find($cartid);
      $cart->delete();
      echo "Product deleted from cart successfully";
      exit;
    }
  
  	public function viewcart()
    {
        $session_id=Session::getId();
        $cart_option=DB::table("tbl_cart")->where("session_id",$session_id)->get();
        $cart=DB::table("tbl_cart")->select(DB::raw('SUM(quantity) as total_quantity'),DB::raw('SUM(total_price) as price'))->where("session_id",$session_id)->first();
        $shipping_amount=DB::table("tbl_shipping")->where("id","1")->first();
        return view('viewcart', ['cart_option' => $cart_option,'cart'=>$cart,'shipping_amount'=>$shipping_amount]);
    }
  
    public function applycoupon(Request $request)
    {
      $couponcode=$request->coupon_code;
      if($couponcode!="")
      {
        $coupon=DB::table('tbl_coupon')->where("name",$couponcode)->whereDate('valid_from','<=', date("Y-m-d"))->whereDate('valid_to','>=', date("Y-m-d"))->first();
        if($coupon)
        {
          	$coupon_amount=$coupon->amount;
            session()->put('coupon_code',$couponcode);
            session()->put('coupon_amount',$coupon_amount);
            return $request->session()->all();  
            
        }
        else
        {
          echo "Please enter the valid coupon code"; exit;
        }
      }
      else
        echo "Please enter the coupon code";
      exit;
    }
  
  	public function checkout()
    {
      $user=DB::table('tbl_user')->where("email",Session::get('username'))->first();
      $user_id=$user->id;
      $addresses=DB::table('tbl_address')->where("user_id",$user_id)->get();
      
      $session_id=Session::getId();
      $cart_option=DB::table("tbl_cart")->where("session_id",$session_id)->get();
      $cart=DB::table("tbl_cart")->select(DB::raw('SUM(quantity) as total_quantity'),DB::raw('SUM(total_price) as price'))->where("session_id",$session_id)->first();
      $shipping_amount=DB::table("tbl_shipping")->where("id","1")->first();

      return view('checkout', ['addresses' => $addresses,'cart_option'=>$cart_option,'cart'=>$cart,'shipping_amount'=>$shipping_amount]);
    }

    
    public function movetocart(Request $request)
    {
      $wishlist_id=$request->wishlist_id;
      $wish=DB::table('tbl_wishlist')->where("id",$wishlist_id)->first();
      $prod_id=$wish->product_id;
    $product=Product::find($prod_id);
    $product_id=$product->id;
      $session_id=Session::getId();
      $quantity=1;
      $price=$product->selling_price;
      $total=$quantity*$price;
      if(empty(Session::get('username')))
        $user_id=0;
      else
      {
        	$user=DB::table('tbl_user')->where("email",Session::get('username'))->first();
        	$user_id=$user->id;
      }
       $id = DB::table('tbl_cart')->insertGetId([
          	'product_id' => $product_id, 
            'quantity' => $quantity,
          	'unit_price'=>$price,
          	'total_price'=>$total,
         	'user_id'=> $user_id,
            'session_id'=>$session_id
	      ]);
      DB::table('tbl_wishlist')->where("id",$wishlist_id)->delete();
      echo "Product moved to cart successfully";
      exit;
      
    }
    
    
}
?>