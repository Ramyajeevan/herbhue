<?php

namespace App\Repositories;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use DB;
use App\Repositories\HomeRepository;
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

    public function getAllProducts()
    {
        $products = Product::get();
        for($i=0;$i<count($products);$i++)
        {
            $product_options=DB::table("tbl_product_options")->where("product_id",$products[$i]->id)->first();
            $products[$i]->product_options=$product_options;
        }
        return  $products;
    }
   

}
