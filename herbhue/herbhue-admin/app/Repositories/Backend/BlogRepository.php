<?php

namespace App\Repositories\Backend;

use App\Models\Blog;
use App\Repositories\BaseRepository;
use DB;
/**
 * Class UserRepository.
 */
class BlogRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Blog::class;
    }

    public function getAllBlog()
    {
        $blog = Blog::orderByDesc("id")->get();
        //dd($blog);
        return $blog;
    }

    public function saveBlog($post){
        // Validate the request...
        $blog = new Blog;
        $blog->title = $post['title'];
        if($post['image']!="") $blog->image = $post['image'];
        $blog->description = $post['description'];
        $blog->save();
        return $blog;
    }

    public function getBlog($id)
    {
        $blog = Blog::findOrFail($id);

        return  $blog;
    }

    public function updateBlog($post,$id)
    {        $blog = Blog::find($id);
        if(isset($blog)){
               $blog->title = $post['title'];
        if($post['image']!="") $blog->image = $post['image'];
        $blog->description = $post['description'];
            return $blog;
        }else{
            return false;
        }
    }

    public function deleteBlog($id)
    {
        try{
            $blog = Blog::find($id);
            if(isset($blog)){
               $blog->delete();
            }else{
                return false;
            }
        }catch(\Exception $exception){
            report($exception);
        }

        return true;
    }
	//start for api
    public function viewcategories()
    {
        $blog = Blog::get();
        return $blog;
    }
}
?>