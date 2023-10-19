<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Cart;
use DB;

use App\Repositories\CartRepository;
class CartController extends Controller
{

  protected $cartRepository;

  public function __construct(CartRepository $cartRepository)
  {
      $this->cartRepository = $cartRepository;
  }

	public function addtocart(Request $request)
    {
      $option_id=$request->option_id;
      $quantity=$request->quantity;
      $cart=$this->cartRepository->addtocart($option_id,$quantity);
      if($cart)
      {
        echo "Product added to cart successfully";
      }
      exit;
      
    }
  	
  	public function incrementvalue(Request $request)
    {
      $optionid=$request->optionid;
      $product=DB::table('tbl_product_options')->where("id",$optionid)->first();
      $product_id=$product->product_id;
      $session_id=Session::getId();
      $quantity=$request->quantity;
      $price=$product->price;
      $total=$quantity*$price;
      $id = DB::table('tbl_cart')->where("session_id",$session_id)->where("option_id",$optionid)->update(['quantity' => $quantity,'unit_price'=>$price,'total_price'=>$total]);
      echo "Product added to cart successfully";
      exit;
      
    }
  	
    public function decrementvalue(Request $request)
    {
      $optionid=$request->optionid;
      $product=DB::table('tbl_product_options')->where("id",$optionid)->first();
      $product_id=$product->product_id;
      $session_id=Session::getId();
      $quantity=$request->quantity;
      $price=$product->price;
      $total=$quantity*$price;
      $id = DB::table('tbl_cart')->where("session_id",$session_id)->where("option_id",$optionid)->update(['quantity' => $quantity,'unit_price'=>$price,'total_price'=>$total]);
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
      $cart=$this->cartRepository->showcart($session_id);
      //echo "<pre>";print_r($cart);echo "</pre>";
      $cart_total=$this->cartRepository->getCartTotal($session_id);
      $cart_total_mrp=$this->cartRepository->getCartTotalMrp($session_id);
      return view('viewcart',["cart"=>$cart,"cart_total"=>$cart_total,"cart_total_mrp"=>$cart_total_mrp]);
    }
  
    public function applycoupon(Request $request)
    {
      $couponcode=$request->coupon_code;

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
          echo "notvalid"; exit;
        }
      

    }
  
  	public function checkout()
    {
      $user=DB::table('tbl_user')->where("email",Session::get('username'))->first();
      if($user)
      {
        $user_id=$user->id;
      }
      else
      {
        return redirect()->route('login');
      }
      $address=$this->cartRepository->showAddress($user_id);
      $cart=$this->cartRepository->showcartUser($user_id);
      $cart_total=$this->cartRepository->getCartTotalUser($user_id);
      $cart_total_mrp=$this->cartRepository->getCartTotalMrpUser($user_id);
      return view('checkout',["cart"=>$cart,"cart_total"=>$cart_total,"cart_total_mrp"=>$cart_total_mrp,"addresses"=>$address]);
    }
}
?>