<?php

namespace App\Repositories\Backend;

use App\Models\Product;
use App\Models\UsersT;
use App\Models\Order;
use App\Models\Address;
use App\Models\Orderproducts;
use App\Repositories\BaseRepository;

use Illuminate\Support\Facades\DB;

/**
 * Class OrderRepository.
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

    public function getAllOrder()
    {
        $order = Order::get();
        return $order;
    }
  
    public function getOrder($id)
    {
        $order = Order::findOrFail($id);
      //dd($order->user_id);
         if(isset($order)){
          $user=UsersT::find($order->user_id);
           //dd($user);
          $order->user_name=$user->name;
        return $order;
        }else{
            return false;
        }
    }

    public function updateOrder($post,$id)
    {
      $order = Order::find($id);
      //dd($order);
      if($post['status']=="delivered")
      {
      $order_id=$order->order_id;
        $orderproducts=DB::table('tbl_order_products')->where('order_id',$order_id)->get();
        for($i=0;$i<count($orderproducts);$i++)
        {
          $productoptions=DB::table('tbl_product_options')->where('id',$orderproducts[$i]->option_id)->first();
          $stock=$productoptions->stock;
          $newstock=$stock-$orderproducts[$i]->quantity;
          DB::table('tbl_product_options')->where('id',$orderproducts[$i]->option_id)->update(['stock'=>$newstock]);
        }
      }
      //  dd($orderproducts);
       if(isset($order))
       {
            $order->status = $post['status'];
            $order->save();
            return $order;
        }else{
            return false;
        }
     // return $order;
    }
    
    public function getOrderProducts($orderid)
    {
        $orderproducts = Orderproducts::where('order_id',$orderid)->get();
        for($i=0;$i<count($orderproducts);$i++)
        {
            $product_name=Product::find($orderproducts[$i]->product_id);
            $orderproducts[$i]->product_name=$product_name->name;
        }
        return $orderproducts;
    }
	public function getBillingDetails($orderid)
    {
      $billing=DB::table('tbl_billing_address')->where('order_id',$orderid)->first();
      return $billing;
    }
  	public function getShippingDetails($orderid)
    {
      $shipping=DB::table('tbl_shipping_address')->where('order_id',$orderid)->first();
      return $shipping;
    }
    public function deleteOrder($id)
    {
        try{
            $order = Order::find($id);
            if(isset($order)){
                $orderid=$order->orderid;
               
            $orderproducts = Orderproducts::where('orderid',$orderid)->delete();
             $order->delete();
            }else{
                return false;
            }
        }catch(\Exception $exception){
            report($exception);
        }

        return true;
    }
	
}
?>