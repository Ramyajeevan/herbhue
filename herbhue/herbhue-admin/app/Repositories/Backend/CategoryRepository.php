<?php

namespace App\Repositories\Backend;

use App\Models\Category;
use App\Repositories\BaseRepository;
use DB;
/**
 * Class UserRepository.
 */
class CategoryRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Category::class;
    }

    public function getAllCategory()
    {
        $category = Category::get();
        return $category;
    }

    public function saveCategory($post){
        // Validate the request...
        $exists=Category::where('name',$post['name'])->count();
        if($exists==0)
        {
        $category = new Category;
        $category->name = $post['name'];
        $category->image = $post['image'];
        $category->save();
       return true;
        }
        else
        return false;
    }

    public function getCategory($id)
    {
        $category = Category::findOrFail($id);

        return  $category;
    }

    public function updateCategory($post,$id)
    {
        $exists=Category::where('name',$post['name'])->where("id","!=",$id)->count();
        if($exists==0)
        {
            $category = Category::find($id);
            if(isset($category))
            {
                $category->name = $post['name'];
                $category->save();
                return true;
            }
        }
        else{
            return false;
        }
    }

    public function deleteCategory($id)
    {
        try{
            $category = Category::find($id);
            if(isset($category)){
                $category->delete();
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