<?php

namespace App\Repositories\Backend;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\UsersT;
use App\Models\RatingReview;

use App\Repositories\BaseRepository;

use Illuminate\Support\Facades\DB;

/**
 * Class ProductRepository.
 */
class ProductRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    public function getAllProduct()
    {
        $product = Product::get();
        for($i=0;$i<count($product);$i++)
        {
          $cat_id=$product[$i]->category_id;
          $category = Category::find($cat_id);
          $product[$i]->category_name=$category->name;
        }
        return $product;
    }


  	public function getAllProductRatings()
    {
      
      $ratinglist = RatingReview::get();
      for($i=0;$i<count($ratinglist);$i++)
      {
        $product=Product::find($ratinglist[$i]->product_id);
        $ratinglist[$i]->product_name=$product->name;
        $user=UsersT::find($ratinglist[$i]->user_id);
        $ratinglist[$i]->user_name=$user->name;
      }
      return $ratinglist;
    }
   public function getAllCategory()
   {
    $category = Category::get();
    return $category;
   }
   public function getAllSubCategory($product_id)
   {
        $category=Product::select("category_id")->where("id",$product_id)->first();
        $subcategory=SubCategory::select("id","name")->where("category_id",$category->category_id)->get();
        return $subcategory;
   }
   public function getAllProductOptions($product_id)
   {
        $product_options=DB::table("tbl_product_options")->where("product_id",$product_id)->get();
        return $product_options;
   }
    public function saveProduct($post,$post1){
        // Validate the request...

        $product = new Product;
        $product->category_id = $post['category_id'];
        $product->subcategory_id = $post['subcategory_id'];
        $product->name = $post['name'];
	    $product->description = $post['description'];
        $product->describe = $post['describe'];
        $product->wellness=$post['wellness'];
      	$product->image1 = $post['image1'];
        $product->image2 = $post['image2'];
        $product->image3 = $post['image3'];
        $product->image4 = $post['image4'];
        $product->image5 = $post['image5'];
        $product->save();
        $total_options=count($post1);
        for($i=0;$i<$total_options;$i++)
        {
          $id = DB::table('tbl_product_options')->insertGetId([
                'product_id' => $product->id, 
              'quantity' => $post1[$i]["quantity"],
                'quantitytype'=>$post1[$i]["quantitytype"],
                'price'=>$post1[$i]["price"],
                'mrp_price'=>$post1[$i]["mrp_price"],
                'stock'=>$post1[$i]["stock"],
            ]);
        }
        
	
      
        return $product;
    }

    public function getProduct($id)
    {
        $product = Product::findOrFail($id);

        return  $product;
    }
	

    public function updateProduct($post,$post1,$id)
    {
     // dd($post);
        $product = Product::find($id);
        if(isset($product)){
            $product->category_id = $post['category_id'];
            $product->subcategory_id = $post['subcategory_id'];
            $product->name = $post['name'];
            $product->description = $post['description'];
            $product->describe = $post['describe'];
            $product->wellness=$post['wellness'];
            if($post['image1']!='') $product->image1 = $post['image1'];
            if($post['image2']!='') $product->image2 = $post['image2'];
            if($post['image3']!='') $product->image3 = $post['image3'];
            if($post['image4']!='') $product->image4 = $post['image4'];
            if($post['image5']!='') $product->image5 = $post['image5'];
            $product->save();
            DB::table('tbl_product_options')->where("product_id",$id)->delete();
            $total_options=count($post1);
            for($i=0;$i<$total_options;$i++)
            {
            $id = DB::table('tbl_product_options')->insertGetId([
                    'product_id' => $product->id, 
                'quantity' => $post1[$i]["quantity"],
                    'quantitytype'=>$post1[$i]["quantitytype"],
                    'price'=>$post1[$i]["price"],
                    'mrp_price'=>$post1[$i]["mrp_price"],
                    'stock'=>$post1[$i]["stock"],
                ]);
            }
            return $product;
        }else{
            return false;
        }
    }

    public function deleteProduct($id)
    {
        try{
            $product = Product::find($id);
            if(isset($product)){
                $product->delete();
            }else{
                return false;
            }
        }catch(\Exception $exception){
            report($exception);
        }

        return true;
    }

    public function showsubcategory($category_id)
    {
        $subcategory=SubCategory::select("id","name")->where("category_id",$category_id)->get();
        return $subcategory;
    }
    public function deleteRating($id)
    {
      try{
            $rating = RatingReview::find($id);
            if(isset($rating)){
                $rating->delete();
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