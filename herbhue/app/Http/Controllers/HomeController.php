<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\HomeRepository;
use DB;
use Session;

class HomeController extends Controller
{
  protected $homeRepository;

  public function __construct(HomeRepository $homeRepository)
  {
      $this->homeRepository = $homeRepository;
  }


    public function index()
    {
        $banner=$this->homeRepository->getAllBanners();
        $category=$this->homeRepository->getAllCategories();
        $product=$this->homeRepository->getAllProducts();
        return view('index',["banner"=>$banner,"category"=>$category,"product"=>$product]);
     // return view('home');
    }
    public function login()
    {
      return view('login');
    }
    public function dashboard()
    {
      return view('dashboard');
    }
  	public function doLogin(Request $request)
    {
      $email=$request->email;
      $password=$request->password;
    //  dd($request);
      $user=DB::table('tbl_user')->where("email",$email)->first();
      if($user)
      {
        if($password!=$user->password)
        {
          return redirect()->back()->with('errors', 'Password Mismatch!');
        }
        else
        {
          session()->put('username',$email);
          return redirect()->route('myaccount');
          //return redirect()->back();
        }
      }
      else
      {
        return redirect()->back()->with('errors', 'User Not exists!');
      }
    }
    
  	public function logout()
    {
      Session::forget('username');
       Session::forget('flash_success');
      Session::forget('flash_danger');
      return redirect()->route('home'); 
    }
  
  	public function doRegister(Request $request)
    {
     // dd($request);
      $name=$request->name;
      $email=$request->email;
      $password=$request->password;
      $mobile=$request->mobile;
      $user=DB::table('tbl_user')->where("email",$email)->first();
      if($user)
      {
        return redirect()->back()->with('errors', 'Email already exists!');
      }
      else
      {
           $userid= DB::table('tbl_user')->insertGetId([
            'name'=>$name,
            'email'=> $email,
            'mobile'=>$mobile,
            'password'=>$password
        ]);
        session()->put('username',$email);
         return redirect()->route('registrationsuccessfull'); 
      }
    }
  	
  	public function resetpassword(Request $request)
    {
      //dd($request);
      $email=$request->email;
      $user=DB::table('tbl_user')->where("email",$email)->first();
      if(!$user)
      {
        return redirect()->back()->with('errors', 'Email not exists!');
      }
      else
      {
         //$usermail = DB::table('tbl_user')->where("email",$email)->first();
        $touseremail=$user->email;
        $message = '<p>Dear User,</p><p>Your Password need to reset!</b></p>';
        $message .= '<div style="width:49%;float:left;padding-right:10px;">';
        $link= url()->to("updatepassword")."?email=".$user->email;
        $message .='<p><a href="'.$link.'">Click here</a> to reset your password.</p>';
        $message .= '</div>';
        $mail_sent = Parent::sendmail($message, env('APP_NAME').' Forgot Password', env('MAIL_USERNAME'), env('APP_NAME'),$touseremail,$user->name);
        return redirect()->back()->with('success', 'Kindly Check your email to reset your password');
      }
    }
    public function updateuserpassword(Request $request)
    {
      //dd($request);
      $email=$request->email;
      $user=DB::table('tbl_user')->where("email",$email)->first();
      if(!$user)
      {
        return redirect()->back()->with('errors', 'Email not exists!');
      }
      else
      {
        DB::table('tbl_user')->where("email",$email)->update(["password"=>$request->password]);
        return redirect()->back()->with('success', 'Password changed successfully');
      }
    }
  	public function myaccount()
    {
      if(empty(Session::get('username')))
      {
          return redirect()->route('login')->with('errors', 'Login and continue');
      }
      else
      {
        $email=Session::get('username');
        $user=DB::table("tbl_user")->where("email",$email)->first();
        $orders=DB::table("tbl_order")->where("user_id",$user->id)->latest('id')->get();
        $url = url()->current();
          $url = explode('/', $url);
         // dd($url);

          if(!isset($url[5])){
              $url[5] = '';
          }
        return view('myaccount',["user"=>$user,"orders"=>$orders,'page'=>$url['5']]);
        //return view('myaccount');
      }
    }
    
    
    public function myaccountsettings(Request $request)
    {
      $email=Session::get('username');
      $user=DB::table('tbl_user')->where("email",$email)->first();
      $user_id=$user->id;
	  DB::table('tbl_user')->where("email",$email)->update(["name"=>$request->name,"mobile"=>$request->mobile]);
       return redirect()->route('myaccount');
    }
    
    public function myaddresses(Request $request)
    {
        if(empty(Session::get('username')))
      {
          return redirect()->route('login')->with('errors', 'Login and continue');
      }
      else
      {
        $email=Session::get('username');
        $user=DB::table('tbl_user')->where("email",$email)->first();
        $user_id=$user->id;
        $addresses=DB::table('tbl_address')->where("user_id",$user_id)->get();
         $url = url()->current();
          $url = explode('/', $url);
         // dd($url);

          if(!isset($url[5])){
              $url[5] = '';
          }
        return view('myaddresses',["user"=>$user,"addresses"=>$addresses,'page'=>$url['5']]);
        //return view('myaddresses');
      }
    }
    
     public function deleteaddress(Request $request)
    {
      $id=$request->id;
      $listid = DB::table('tbl_address')->where("id",$id)->delete();
       echo "Address removed successfully";
      exit;
    }
    
    public function myorders()
    {
      if(empty(Session::get('username')))
      {
          return redirect()->route('login')->with('errors', 'Login and continue');
      }
      else
      {
        $email=Session::get('username');
        $user=DB::table("tbl_user")->where("email",$email)->first();
        $orders=DB::table("tbl_order")->where("user_id",$user->id)->latest('id');
        $orders=$orders->paginate(5);
        for($i=0;$i<count($orders);$i++)
        {
            $order_products=DB::table("tbl_order_products")->where("order_id",$orders[$i]->order_id)->first();
            $orders[$i]->product_id=$order_products->product_id;
            $productdetail=DB::table("tbl_product")->where("id",$orders[$i]->product_id)->first();
            $orders[$i]->product_name=$productdetail->name;
            $orders[$i]->image1=$productdetail->image1;
        }
        //dd($orders);
        $url = url()->current();
        $url = explode('/', $url);
        // dd($url);
        
        if(!isset($url[5])){
          $url[5] = '';
        }
        return view('myorders',["user"=>$user,"orders"=>$orders,'page'=>$url['5']]);
        //return view('myorders');
      }
    }
  	public function vieworder($id)
    {
      $email=Session::get('username');
      $user=DB::table("tbl_user")->where("email",$email)->first();
      $orders=DB::table("tbl_order")->where("id",$id)->first();
      $order_products=DB::table("tbl_order_products")->where("order_id",$orders->order_id)->get();
      $billing=DB::table("tbl_billing_address")->where("order_id",$orders->order_id)->first();
      $url = url()->current();
        $url = explode('/', $url);
        // dd($url);
        
        if(!isset($url[5])){
          $url[5] = '';
        }
      return view('vieworder', ["user"=>$user,'order' => $orders,'order_products'=>$order_products,'billing'=>$billing,'page'=>$url['5']]);
    }
  	public function products(Request $request)
    {
      //dd(request());
        
        
        $products = Product::where("status","1");
        $category_name=""; $subcategory_name="";
        if(!empty($request->category_id))
        {
          $category=Category::find($request->category_id);
          if(isset($category)) $category_name=$category->name; else $category_name="";
          $products=$products->where("category_id",$request->category_id);
        }
        if(!empty($request->subcategory_id))
        {
          $subcategory=SubCategory::find($request->subcategory_id);
          if(isset($subcategory)) $subcategory_name=$subcategory->name; else $subcategory_name="";
          $products=$products->where("subcategory_id",$request->subcategory_id);
        }  
       
       // $products=$products->get();
        $pricefilter=request()->pricefilter;
      	if($pricefilter!="")
        {
          list($min,$max)=@explode(";",$pricefilter);
          $products=$products->where("selling_price",">=",$min)->where("selling_price","<=",$max);
        }
        
       if(isset($request->searchkey))
       {
           $products=$products->where("name", 'like', '%'.$request->searchkey.'%');
       }
       $products=$products->paginate(12);
   
        
        $maxprice=0;
        $price=Product::max("selling_price");
        $maxprice=round($price);
        return view('products', ['products' => $products,'maxprice'=>$maxprice,'category_name'=>$category_name]);
    }
  	
  	public function productdetail($id)
    {
      $products = Product::where("id",$id)->first();
	  $category=Category::where("id",$products->category_id)->first();
      $subcategory=SubCategory::where("id",$products->subcategory_id)->first();
      
      
      $related_products = Product::where("id","!=",$id);
       $related_products=$related_products->where("category_id",$products->category_id);
      $related_products=$related_products->where("subcategory_id",$products->subcategory_id);
      $related_products=$related_products->get();
       for($i=0;$i<count($related_products);$i++)
        {
           $category_name=Category::find($related_products[$i]->category_id);
          if(isset($category_name))
            $related_products[$i]->category_name=$category_name->name;
          else
            $related_products[$i]->category_name="";
        }
      $rating_product = DB::table('tbl_rating_review')->select('product_id', DB::raw('SUM(rating) as sum_rating'),DB::raw('count(user_id) as totalusers')) ->where('status','1')->where('product_id',$products->id) ->groupBy("product_id")->first();
        if(isset($rating_product))
        {
          $sum_rating=$rating_product->sum_rating;   
          $totalusers=$rating_product->totalusers;
          $rating=$sum_rating/$totalusers;
        }
        else
        {
          $sum_rating=0;   
          $totalusers=0;
          $rating=0;
        }
         $rating_products = DB::table('tbl_rating_review')->where('status','1')->where('product_id',$products->id)->get();
      return view('productdetail', ['products' => $products,'related_products'=>$related_products,'rating_products'=>$rating_products,'category_name'=>$category->name,'subcategory_name'=>$subcategory->name,'rating'=>$rating,'totalusers'=>$totalusers]);
    }
  	
  	public function forgotpassword()
    {
      return view('forgotpassword');
    }
  	public function updatepassword(Request $request)
    { 
   // dd($request);
      return view('updatepassword',['email',$request->email]);
    }
  	public function searchproducts(Request $request)
    {
      $searchkey=$request->searchkey;
      
        $products = Product::where("status","1");
      if($searchkey!='')
      {
        $products=$products->where("name","LIKE","%".$searchkey."%");
      }
      	// $products=$products->get();
       $products=$products->paginate(10);
      $productsprice=[];
      	for($i=0;$i<count($products);$i++)
        {
          $products[$i]->product_options=DB::table("tbl_product_options")->where("product_id",$products[$i]->id)->get();
        }
        return view('search', ['products' => $products,'searchkey'=>$searchkey]);
    }
  
  	public function terms()
    {
      return view('terms');
    }

    public function register()
    {
      return view('register');
    }
  	public function privacy()
    {
      return view('privacy');
    }
  	public function refund()
    {
      return view('refund');
    }
  	public function shipping()
    {
      return view('shipping');
    }
  public function productshipping()
    {
      return view('productshipping');
    }
    public function faq()
    {
      return view('faq');
    }
  	public function contact()
    {
      return view('contact');
    }
    public function aboutus()
    {
      return view('aboutus');
    }
    public function registrationsuccessfull()
    {
      return view('registrationsuccessfull');
    }
  	public function mywishlist()
    {
      if(empty(Session::get('username')))
      {
          return redirect()->route('login')->with('errors', 'Login and continue');
      }
      else
      {
        $email=Session::get('username');
        $user=DB::table("tbl_user")->where("email",$email)->first();
        $wishlist=DB::table("tbl_wishlist")->where("user_id",$user->id)->get();

        $url = url()->current();
        $url = explode('/', $url);
        // dd($url);
        
        if(!isset($url[5])){
          $url[5] = '';
        }
        return view('mywishlist',["user"=>$user,"wishlist"=>$wishlist,'page'=>$url['5']]);
      }
    }
    public function addtowishlist(Request $request)
    {
      $product_id=$request->product_id;
     if(empty(Session::get('username')))
        $user_id=0;
      else
      {
        	$user=DB::table('tbl_user')->where("email",Session::get('username'))->first();
        	$user_id=$user->id;
      }
       $wishlist=DB::table("tbl_wishlist")->where("user_id",$user_id)->where("product_id",$product_id)->first();
       if(!$wishlist)
       {
       $id = DB::table('tbl_wishlist')->insertGetId([
          	'product_id' => $product_id, 
            'user_id' => $user_id
	      ]);
      echo "Product added to wishlist successfully";
       }
       else
       {
           echo "Product already added in wishlist";
       }
      exit;
    }
  	public function deletewishlist(Request $request)
    {
      $id=$request->id;
       $listid = DB::table('tbl_wishlist')->where("id",$id)->delete();
       echo "Product removed from wishlist successfully";
      exit;
    }
  	public function subscribe(Request $request)
    {
      $email=$request->email;
      $subscribe=DB::table('tbl_newsletter')->where("email",$email)->first();
      if($subscribe)
      {
        echo "Newsletter subscribed successfully";
        exit;
      }
      else
      {
        $id = DB::table('tbl_newsletter')->insertGetId([
          	'email' => $email
	      ]);
        echo "Newsletter subscribed successfully";
        exit;
      }
    }
  	
  	public function addrating(Request $request)
    {
      $email=Session::get('username');
      $user=DB::table('tbl_user')->where("email",$email)->first();
      $user_id=$user->id;
     
       $id = DB::table('tbl_rating_review')->insertGetId([
          	'product_id' => $request->product_id, 
            'user_id' => $user_id,
         	'rating' => $request->rate, 
         	'review' => $request->review 
	      ]);
      //dd($request);
      	return redirect()->route('productdetail',['id'=>$request->product_id]); 
    }
    
    public function updateaccount(Request $request)
    {
      $email=Session::get('username');
      $user=DB::table('tbl_user')->where("email",$email)->first();
      $user_id=$user->id;
      dd($user);
    }
}
