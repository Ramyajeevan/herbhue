<?php

namespace App\Repositories;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Cart;
use DB;
use Session;
use App\Repositories\CartRepository;
use Illuminate\Support\Str;
/**
 * Class UserRepository.
 */
class CartRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Cart::class;
    }

    public function addtocart($option_id,$quantity)
    {
      $product=DB::table('tbl_product_options')->where("id",$option_id)->first();
      $product_id=$product->product_id;
      $session_id=Session::getId();
      
      
        if(empty(Session::get('username')))
        {
          $user_id=0;
        }
        else
        {
            $user=DB::table('tbl_user')->where("email",Session::get('username'))->first();
            $user_id=$user->id;
        }         
      $cart_count=Cart::where("session_id",$session_id)->where("option_id",$option_id)->count();
      if($cart_count==0)
      {
        $price=$product->price;
        $total=$quantity*$price;
        $cart=new Cart;
        $cart->product_id=$product_id;
        $cart->quantity=$quantity;
        $cart->unit_price=$price;
        $cart->total_price=$total;
        $cart->option_id=$option_id;
        $cart->user_id=$user_id;
        $cart->session_id=$session_id;
        $cart->save();
      }
      else
      {
        $cart=Cart::where("session_id",$session_id)->where("option_id",$option_id)->first();
        $cart_quantity=$cart->quantity;
        $price=$product->price;
        $quantity=$quantity+$cart_quantity;
        $total=$quantity*$price;

        $cart->quantity=$quantity;
        $cart->unit_price=$price;
        $cart->total_price=$total;
        $cart->user_id=$user_id;
        $cart->session_id=$session_id;
        $cart->save();

      }
      return $cart;
      
    }

    public function showcart($session_id)
    {
      $cart=Cart::where("session_id",$session_id)->get();
      for($i=0;$i<count($cart);$i++)
      {
        $product=Product::find($cart[$i]->product_id);
        $cart[$i]->product_name=$product->name;
        $cart[$i]->product_image=$product->image1;
        $cart[$i]->describe=$product->describe;
        $product_options=DB::table('tbl_product_options')->where("id",$cart[$i]->option_id)->first();
        $cart[$i]->price=$product_options->price;
        $cart[$i]->mrp_price=$product_options->mrp_price;
      }
      return $cart;
    }

    public function getCartTotal($session_id)
    {
      $cart_total=0;
      $cart=Cart::where("session_id",$session_id)->get();
      for($i=0;$i<count($cart);$i++)
      {
        $cart_total+=$cart[$i]->total_price;
      }
      return $cart_total;
    }
    public function getCartTotalMrp($session_id)
    {
      $cart_total_mrp=0;
      $cart=Cart::where("session_id",$session_id)->get();
      for($i=0;$i<count($cart);$i++)
      {
        $product_options=DB::table('tbl_product_options')->where("id",$cart[$i]->option_id)->first();
        $total_mrp=$product_options->mrp_price*$cart[$i]->quantity;
        $cart_total_mrp+=$total_mrp;
      }
      return $cart_total_mrp;
    }

    public function showcartUser($user_id)
    {
      $cart=Cart::where("user_id",$user_id)->get();
      for($i=0;$i<count($cart);$i++)
      {
        $product=Product::find($cart[$i]->product_id);
        $cart[$i]->product_name=$product->name;
        $cart[$i]->product_image=$product->image1;
        $cart[$i]->describe=$product->describe;
        $product_options=DB::table('tbl_product_options')->where("id",$cart[$i]->option_id)->first();
        $cart[$i]->price=$product_options->price;
        $cart[$i]->mrp_price=$product_options->mrp_price;
      }
      return $cart;
    }

    public function getCartTotalUser($user_id)
    {
      $cart_total=0;
      $cart=Cart::where("user_id",$user_id)->get();
      for($i=0;$i<count($cart);$i++)
      {
        $cart_total+=$cart[$i]->total_price;
      }
      return $cart_total;
    }
    public function getCartTotalMrpUser($user_id)
    {
      $cart_total_mrp=0;
      $cart=Cart::where("user_id",$user_id)->get();
      for($i=0;$i<count($cart);$i++)
      {
        $product_options=DB::table('tbl_product_options')->where("id",$cart[$i]->option_id)->first();
        $total_mrp=$product_options->mrp_price*$cart[$i]->quantity;
        $cart_total_mrp+=$total_mrp;
      }
      return $cart_total_mrp;
    }

    public function showAddress($user_id)
    {
      $address=DB::table("tbl_address")->where("user_id",$user_id)->get();
      return $address;
    }
    
}
