<?php

namespace App\Repositories\Backend;

use App\Models\Category;
use App\Models\SubCategory;
use App\Repositories\BaseRepository;

/**
 * Class UserRepository.
 */
class SubCategoryRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return SubCategory::class;
    }

    public function getAllSubCategory()
    {
        $subcategory = SubCategory::get();
        for($i=0;$i<count($subcategory);$i++)
        {
          $cat_id=$subcategory[$i]->category_id;
          $category = Category::find($cat_id);
          if(isset($category))
          $subcategory[$i]->category_name=$category->name;
          else
          $subcategory[$i]->category_name='';
        }
        return $subcategory;
    }
   public function getAllCategory()
   {
        $category = Category::get();
        return $category;
   }
    public function saveSubCategory($post){
        // Validate the request...

        $subcategory = new SubCategory;
        $subcategory->category_id = $post['category_id'];
        $subcategory->name = $post['name'];
		 $subcategory->image = $post['image'];
        $subcategory->save();

        return $subcategory;
    }

    public function getSubCategory($id)
    {
        $subcategory = SubCategory::findOrFail($id);

        return  $subcategory;
    }

    public function updateSubCategory($post,$id)
    {
        $subcategory = SubCategory::find($id);
        if(isset($subcategory)){
            $subcategory->category_id = $post['category_id'];
        $subcategory->name = $post['name'];
          if(isset($post['image']))
		$subcategory->image = $post['image'];
        $subcategory->save();

        return $subcategory;
        }else{
            return false;
        }
    }

    public function deleteSubCategory($id)
    {
        try{
            $subcategory = SubCategory::find($id);
            if(isset($subcategory)){
                $subcategory->delete();
            }else{
                return false;
            }
        }catch(\Exception $exception){
            report($exception);
        }

        return true;
    }
     //start for api
    public function viewsubcategories()
    {
        $subcategory = SubCategory::get();
        for($i=0;$i<count($subcategory);$i++)
        {
          $cat_id=$subcategory[$i]->category_id;
          $category = Category::find($cat_id);
          $subcategory[$i]->category_name=$category->name;
        }
        return $subcategory;
    }
    public function viewsubcategory($category_id)
    {
        $subcategory = SubCategory::get();
        if(isset($category_id))
        {
            $subcategory=$subcategory->where('category_id',$category_id);
            for($i=0;$i<count($subcategory);$i++)
            {
              $cat_id=$subcategory[$i]->category_id;
              $category = Category::find($cat_id);
              $subcategory[$i]->category_name=$category->name;
            }
            return $subcategory;
        }
        else
            return false;
        
    }
}
?>