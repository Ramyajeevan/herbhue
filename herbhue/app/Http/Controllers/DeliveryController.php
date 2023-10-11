<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;

class DeliveryController extends Controller
{
  public function deliveryboy()
  {
     return view('deliveryboy');
  }
  public function deliveryboylogin(Request $request)
    {
      $email=$request->email;
      $password=$request->password;
      $user=DB::table('tbl_deliveryboy')->where("email",$email)->first();
      Session::forget('flash_success');
      Session::forget('flash_danger');
      if($user)
      {
        if($password!=$user->password)
        {
          session()->put('flash_danger','Password mismatch!');
          return view('includes.partials.messages');
          //echo '<script>alert("Password mismatch!");</script>'; exit;
        }
        else
        {
          session()->put('deliveryusername',$email);
          return redirect()->route('deliveryboymyaccount');
        }
      }
    }
    
  	public function deliveryboylogout()
    {
      Session::forget('deliveryusername');
       Session::forget('flash_success');
      Session::forget('flash_danger');
      return redirect()->route('deliveryboy'); 
    }
  	public function deliveryboymyaccount()
    {
      $deliveryboy_email=Session::get('deliveryusername');
      if(!empty($deliveryboy_email)){
      $deliveryboy=DB::table('tbl_deliveryboy')->where("email",$deliveryboy_email)->first();
      $assigned_order=DB::table('tbl_order')->where("deliveryboy_id",$deliveryboy->id)->whereIn('status',['waiting','ordered','dispatched'])->get();
      $delivered_order=DB::table('tbl_order')->where("deliveryboy_id",$deliveryboy->id)->where('status','delivered')->get();
      $cancelled_order=DB::table('tbl_order')->where("deliveryboy_id",$deliveryboy->id)->where('status','cancelled')->get();
      $mymessages=DB::table('tbl_messages')->where("to_user",$deliveryboy->id)->where('from_user','0')->get();
      return view('deliveryboymyaccount',['deliveryboy'=>$deliveryboy,'assigned_order'=>$assigned_order,'delivered_order'=>$delivered_order,'cancelled_order'=>$cancelled_order,'mymessages'=>$mymessages]);
      }
      else
      {
         return redirect()->route('deliveryboy'); 
      }
    }
  	public function deliveryboyvieworder($id)
    {
      $orders=DB::table("tbl_order")->where("id",$id)->first();
      $order_products=DB::table("tbl_order_products")->where("order_id",$orders->order_id)->get();
      $billing=DB::table("tbl_billing_address")->where("order_id",$orders->order_id)->first();
      return view('deliveryboyvieworder', ['order' => $orders,'order_products'=>$order_products,'billing'=>$billing]);
    }
  
  	public function destroy($id)
    {
        $messages = DB::table('tbl_messages')->where("id",$id)->delete();
        echo "Messages deleted successfully";

    }
    public function addmessage(Request $request)
    {
      $deliveryboy_email=Session::get('deliveryusername');
      $deliveryboy=DB::table('tbl_deliveryboy')->where("email",$deliveryboy_email)->first();
      $mymessages=DB::table('tbl_messages')->insertGetId([
        'deliveryboy_id' => $deliveryboy->id,
        'from_user' => $deliveryboy->id,
        'to_user'=>0,
        'message'=>$request->messagetoadmin
      ]);
       return redirect()->route('deliveryboymyaccount');
    }
  	public function updateprofile(Request $request)
    {
      $deliveryboy_email=Session::get('deliveryusername');
      DB::table('tbl_deliveryboy')->where("email",$deliveryboy_email)->update(["name"=>$request->name,"address"=>$request->address,"city"=>$request->city,"pincode"=>$request->pincode,"mobile"=>$request->mobile,"password"=>$request->password,"dob"=>$request->dob]);
   	  return redirect()->route('deliveryboymyaccount');
    }
}
?>