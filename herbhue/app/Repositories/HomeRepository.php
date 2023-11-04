<?php

namespace App\Repositories;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Brand;
use App\Models\User;
use App\Models\Product;
use App\Models\Contact;
use DB;
use Session;
use App\Repositories\HomeRepository;
use Illuminate\Support\Str;
/**
 * Class UserRepository.
 */
class HomeRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Banner::class;
    }

    public function getAllBanners()
    {
        $banner = Banner::get();
       return $banner;
    }

    
    public function getAllCategories()
    {
        $catgories = Category::get();
        return  $catgories;
    }
    public function getAllBrands()
    {
        $brand = Brand::get();
        return  $brand;
    }
    public function getAllProducts()
    {
        $products = Product::limit(4)->orderbydesc("id")->get();
        for($i=0;$i<count($products);$i++)
        {
            $category=Category::find($products[$i]->category_id);
            if(isset($category)) $category_name=$category->name; else $category_name="";
            $products[$i]->category_name=$category_name;
          
            $product_options=DB::table("tbl_product_options")->where("product_id",$products[$i]->id)->first();
            $products[$i]->product_options=$product_options;
            $products[$i]->description=Str::limit($products[$i]->description, 30, '...');
        }
        return  $products;
    }
    
    public function getAllWellProducts()
    {
        $products = Product::where("wellness","yes")->get();
        for($i=0;$i<count($products);$i++)
        {
            $product_options=DB::table("tbl_product_options")->where("product_id",$products[$i]->id)->first();
            $products[$i]->product_options=$product_options;
            
            $products[$i]->description=Str::limit($products[$i]->description, 30, '...');
        }
        return  $products;
    }

    public function getProductDetail($product_id)
    {
        $products = Product::find($product_id);
        $product_options=DB::table("tbl_product_options")->where("product_id",$product_id)->get();
        $products->product_options=$product_options;
        $category=Category::find($products->category_id);
        if(isset($category)) $category_name=$category->name; else $category_name="";
        $products->category_name=$category_name;
      
           // $products[$i]->description=htmlspecialchars($products[$i]->description);
        return  $products;
    }

    public function getProducts($category_id,$subcategory_id)
    {
       
        $products = Product::where("id","!=","");
        if(!empty($category_id))
        {
          $products=$products->where("category_id",$category_id);
        }
        if(!empty($subcategory_id))
        {
          $products=$products->where("subcategory_id",$subcategory_id);
        }  
        $products = $products->get();
        for($i=0;$i<count($products);$i++)
        {
          $products[$i]->description=Str::limit($products[$i]->description, 30, '...');
            $product_options=DB::table("tbl_product_options")->where("product_id",$products[$i]->id)->first();
            $products[$i]->product_options=$product_options;
        }
        return  $products;
    }
    public function addtowishlist($product_id)
    {
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
          return true;
       }
       else
       {
           echo false;
       }
    }

    public function getMyWishlist($user_id)
    {
        $wishlist=DB::table("tbl_wishlist")->where("user_id",$user_id)->get();
        for($i=0;$i<count($wishlist);$i++)
        {
            $product=Product::select("name","describe","image1")->where("id",$wishlist[$i]->product_id)->first();
            $wishlist[$i]->product_name=$product->name;
            $wishlist[$i]->describe=$product->describe;
            $wishlist[$i]->product_image=$product->image1;
            $product_options=DB::table("tbl_product_options")->select("price","mrp_price")->where("product_id",$wishlist[$i]->product_id)->first();
            $wishlist[$i]->price=$product_options->price;
            $wishlist[$i]->mrp_price=$product_options->mrp_price;
        }
        return $wishlist;
    }
    public function getMyOrders($user)
    {
        $orders=DB::table("tbl_order")->where("user_id",$user->id)->latest('id');
        $orders=$orders->get();
        for($i=0;$i<count($orders);$i++)
        {
            $order_products=DB::table("tbl_order_products")->where("order_id",$orders[$i]->order_id)->first();
            $orders[$i]->product_id=$order_products->product_id;
            $productdetail=DB::table("tbl_product")->where("id",$orders[$i]->product_id)->first();
            $orders[$i]->product_name=$productdetail->name;
            $orders[$i]->image1=$productdetail->image1;
            $orders[$i]->added_date=date("Y-m-d",strtotime($orders[$i]->added_date));
        }
        //dd($orders);
        return $orders;

    }
    public function getWishlist($product_id)
    {
        if(empty(Session::get('username')))
        {
            $user_id=0;
            $wishlist_user=0;
        }
        else
        {
            $user=DB::table('tbl_user')->where("email",Session::get('username'))->first();
            $user_id=$user->id;
            $wishlist=DB::table("tbl_wishlist")->where("user_id",$user_id)->where("product_id",$product_id)->first();
            if(isset($wishlist))
            {
                $wishlist_user=1;
            }
            else
            {
                $wishlist_user=0;
            }
        }
        return $wishlist_user;
    }

    public function checkpincode($pincode)
    {
        $pincode=DB::table("tbl_pincode")->where("pincode",$pincode)->first();
        if($pincode)
            return true;
        else
            return false;
    }

    public function subscribe($email)
    {
        $subscribe=DB::table('tbl_newsletter')->where("email",$email)->first();
        if(!$subscribe)
        {
            $id = DB::table('tbl_newsletter')->insertGetId([
                'email' => $email
            ]);
        }
        return true;
    }

    public function getProductReviews($product_id)
    {
        $rating_products = DB::table('tbl_rating_review')->where('status','1')->where('product_id',$product_id)->get();
        for($i=0;$i<count($rating_products);$i++)
        {
            $user=User::Find($rating_products[$i]->user_id);
            if(isset($user))
                $username=$user->name;
            else
                $username="";
            $rating_products[$i]->user_name=$username;
             // Declare and define two dates
             $date1 = strtotime($rating_products[$i]->added_date);
             $date2 = strtotime(date("Y-m-d H:i:s"));

             // Formulate the Difference between two dates
             $diff = abs($date2 - $date1);
             
             // To get the year divide the resultant date into
             // total seconds in a year (365*60*60*24)
             $years = floor($diff / (365*60*60*24));

             // To get the month, subtract it with years and
             // divide the resultant date into
             // total seconds in a month (30*60*60*24)
             $months = floor(($diff - $years * 365*60*60*24)	/ (30*60*60*24));

             // To get the day, subtract it with years and
             // months and divide the resultant date into
             // total seconds in a days (60*60*24)
             $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

             // To get the hour, subtract it with years,
             // months & seconds and divide the resultant
             // date into total seconds in a hours (60*60)
             $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));

             // To get the minutes, subtract it with years,
             // months, seconds and hours and divide the
             // resultant date into total seconds i.e. 60
             $minutes = floor(($diff - $years * 365*60*60*24	- $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);

             // To get the minutes, subtract it with years,
             // months, seconds, hours and minutes
             $seconds = floor(($diff - $years * 365*60*60*24	- $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));
             $rating_products[$i]->days="";
            //$leads[$i]->days=$years." years, ".$months." months, ".$days." days, ".$hours." hours, ".$minutes." minutes, ".$seconds." seconds";
            if($years>0)
                 $rating_products[$i]->days.=$years." years ";
            if($months>0)
                 $rating_products[$i]->days.=$months." months ";
             if($days>0)
                 $rating_products[$i]->days.=$days." days ";
             if($hours>0)
                 $rating_products[$i]->days.=$hours." hours ";
             if($minutes>0)
                 $rating_products[$i]->days.=$minutes." minutes ";
             if($seconds>0)
                 $rating_products[$i]->days.=$seconds." seconds ";
        }
        return $rating_products;
    }

    public function getProductRatings($product_id)
    {
        $rating_product = DB::table('tbl_rating_review')->select('product_id', DB::raw('SUM(rating) as sum_rating'),DB::raw('count(user_id) as totalusers')) ->where('status','1')->where('product_id',$product_id) ->groupBy("product_id")->first();
        if(isset($rating_product))
        {
          $sum_rating=$rating_product->sum_rating;   
          $totalusers=$rating_product->totalusers;
          $rating1=$sum_rating/$totalusers;
        }
        else
        {
          $sum_rating=0;   
          $totalusers=0;
          $rating1=0;
        }
        $rating=array();
        $rating["totalusers"]=$totalusers;
        $rating["stars"]=round($rating1,2);
        return $rating;
    }

    public function getProductRating($product_id,$rating)
    {
       
        $product_totalusers=0;
        $total_rating_product = DB::table('tbl_rating_review')->select('product_id', DB::raw('count(user_id) as totalusers')) ->where('status','1')->where('product_id',$product_id)->groupBy("product_id")->first();
        if(isset($total_rating_product))
            $product_totalusers=$total_rating_product->totalusers;
        $rating_product = DB::table('tbl_rating_review')->select('product_id',DB::raw('count(user_id) as totalusers')) ->where('status','1')->where('product_id',$product_id)->where("rating",$rating)->groupBy("product_id")->first();

        if(isset($rating_product))
        {
            $totalusers=$rating_product->totalusers;
            $rating1=$totalusers/$product_totalusers;
        }
        else
        {
            $totalusers=0;
            $rating1=0;
        }
        $rating=array();
        $rating["totalusers"]=$totalusers;
        $rating["stars"]=round($rating1,2);
        $rating["percent"]=round($rating1,2)*100;
        return $rating;
    }
    public function getAllRatings()
    {
        $rating_product = DB::table('tbl_rating_review')->get();
        for($i=0;$i<count($rating_product);$i++)
        {
            $product=Product::find($rating_product[$i]->product_id);
            $rating_product[$i]->product_name=$product->name;
            $user=User::Find($rating_product[$i]->user_id);
            if(isset($user))
                $username=$user->name;
            else
                $username="";
            $rating_product[$i]->user_name=$username;
             // Declare and define two dates
             $date1 = strtotime($rating_product[$i]->added_date);
             $date2 = strtotime(date("Y-m-d H:i:s"));

             // Formulate the Difference between two dates
             $diff = abs($date2 - $date1);
             
             // To get the year divide the resultant date into
             // total seconds in a year (365*60*60*24)
             $years = floor($diff / (365*60*60*24));

             // To get the month, subtract it with years and
             // divide the resultant date into
             // total seconds in a month (30*60*60*24)
             $months = floor(($diff - $years * 365*60*60*24)	/ (30*60*60*24));

             // To get the day, subtract it with years and
             // months and divide the resultant date into
             // total seconds in a days (60*60*24)
             $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

             // To get the hour, subtract it with years,
             // months & seconds and divide the resultant
             // date into total seconds in a hours (60*60)
             $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));

             // To get the minutes, subtract it with years,
             // months, seconds and hours and divide the
             // resultant date into total seconds i.e. 60
             $minutes = floor(($diff - $years * 365*60*60*24	- $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);

             // To get the minutes, subtract it with years,
             // months, seconds, hours and minutes
             $seconds = floor(($diff - $years * 365*60*60*24	- $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));
             $rating_product[$i]->days="";
            //$leads[$i]->days=$years." years, ".$months." months, ".$days." days, ".$hours." hours, ".$minutes." minutes, ".$seconds." seconds";
            if($years>0)
                 $rating_product[$i]->days.=$years." years ";
            if($months>0)
                 $rating_product[$i]->days.=$months." months ";
             if($days>0)
                 $rating_product[$i]->days.=$days." days ";
             if($hours>0)
                 $rating_product[$i]->days.=$hours." hours ";
             if($minutes>0)
                 $rating_product[$i]->days.=$minutes." minutes ";
             if($seconds>0)
                 $rating_product[$i]->days.=$seconds." seconds ";
        }
        return $rating_product;
    }
    public function contactus($name,$email,$query)
    {
        $ticket_id=$this->getTicketId();
        $contact=new Contact;
        $contact->name=$name;
        $contact->email=$email;
        $contact->query=$query;
        $contact->ticket_id=$ticket_id;
        $contact->save();
        return $contact;
    }

    public function getTicketId()
    {
        $ticket_id="HHTICK-".rand(100000,999999);
        $count=Contact::where("ticket_id",$ticket_id)->count();
        if($count>0)
        {
            $ticket_id=$this->getTicketId();
        }
        return $ticket_id;
    }

    public function getRelatedProducts($id)
    {
        $products=Product::find($id);
        $related_products = Product::where("id","!=",$id);
        $related_products=$related_products->where("category_id",$products->category_id);
        $related_products=$related_products->where("subcategory_id",$products->subcategory_id);
        $related_products=$related_products->get();
        for($i=0;$i<count($related_products);$i++)
        {
            $product_options=DB::table("tbl_product_options")->select("price","mrp_price")->where("product_id",$related_products[$i]->id)->first();
            $related_products[$i]->price=$product_options->price;
            $related_products[$i]->mrp_price=$product_options->mrp_price;
        }
        return $related_products;
    }

    public function getAllRelatedProducts()
    {
        $related_products = Product::get();
        for($i=0;$i<count($related_products);$i++)
        {
            $product_options=DB::table("tbl_product_options")->select("price","mrp_price")->where("product_id",$related_products[$i]->id)->first();
            $related_products[$i]->price=$product_options->price;
            $related_products[$i]->mrp_price=$product_options->mrp_price;
        }
        return $related_products;
    }

    public function getMyPersonalise($user_id)
    {
        $personalise=DB::table("tbl_personalize")->where("user_id",$user_id)->get();
        return $personalise;
    }

    public function personaliseupdate($id,$answer)
    {
        $personalise=DB::table("tbl_personalize")->where("id",$id)->update([
            "answer"=>$answer
        ]);
        return $personalise;
    }
}
