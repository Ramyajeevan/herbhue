<?php

namespace App\Repositories;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use DB;
use Session;
use App\Repositories\OrderRepository;
use Illuminate\Support\Str;
/**
 * Class UserRepository.
 */
class OrderRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Order::class;
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

    public function showAddress($user_id)
    {
      $address=DB::table("tbl_address")->where("user_id",$user_id)->get();
      return $address;
    }
    
}
