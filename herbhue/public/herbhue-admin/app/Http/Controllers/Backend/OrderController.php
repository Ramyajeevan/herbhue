<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Backend\OrderRepository;
use DB;

class OrderController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = $this->orderRepository->getAllOrder();
		for($i=0;$i<count($order);$i++)
        {
          $address=DB::table('tbl_address')->where('id',$order[$i]->address_id)->first();
          $order[$i]->name=$address->firstname;
          $order[$i]->mobile=$address->phone;
          $order[$i]->address1=$address->street_address;
          $order[$i]->address2=$address->street_address2;
          $order[$i]->pincode=$address->pincode;
        /* $billing=$this->orderRepository->getBillingDetails($order[$i]->order_id);
          if(isset($billing))
          {
         $order[$i]->name=$billing->billing_firstname;
          $order[$i]->mobile=$billing->billing_phone;
          $order[$i]->address1=$billing->billing_street_address;
          $order[$i]->address2=$billing->billing_street_address2;
          $order[$i]->pincode=$billing->billing_pincode;
          }
          else
          {
            $order[$i]->name="";
          $order[$i]->mobile="";
          $order[$i]->address1="";
          $order[$i]->address2="";
          $order[$i]->pincode="";
          }*/
        }
      //dd($order);
        return view('Backend.Order.index', ['order' => $order]);
    }


    public function edit($id)
    {
       $order = $this->orderRepository->getOrder($id);
     
        if($order)
        {
            $orderproducts = $this->orderRepository->getOrderProducts($order->order_id);
            $address=DB::table('tbl_address')->where('id',$order->address_id)->first();
          	//$billing=$this->orderRepository->getBillingDetails($order->order_id);
            //$shipping=$this->orderRepository->getShippingDetails($order->order_id);
            $productcount=count($orderproducts);
           return view('Backend.Order.edit',['order'=>$order,'orderproducts'=>$orderproducts,'productcount'=>$productcount,'address'=>$address]);
            //return view('Backend.Order.edit',['order'=>$order,'orderproducts'=>$orderproducts,'productcount'=>$productcount,'deliveryboy'=>$deliveryboy,'billing'=>$billing,'shipping'=>$shipping]);
        }else{
            return redirect()->route('order.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        $post = [
            'status'=>$request->status
        ];
        $updateOrder = $this->orderRepository->updateOrder($post,$id);
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = $this->orderRepository->deleteOrder($id);
        echo "Order deleted successfully";

    }
}
?>