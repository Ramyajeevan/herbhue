<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Backend\BlogRepository;
use App\Models\Blog;
use DB;

class BlogController extends Controller
{
    protected $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $email=$request->session()->get('username');
        $admin=DB::table("tbl_admin")->where("email",$email)->first();
        if($admin)
        {
        $blog = $this->blogRepository->getAllBlog();

        return view('Backend.Blog.index', ['blogs' => $blog]);
        }
        else
            return redirect()->route('login')->with('errors', 'Admin Not Exists!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $email=$request->session()->get('username');
        $admin=DB::table("tbl_admin")->where("email",$email)->first();
        if($admin)
        return view('Backend.Blog.add');
        else
            return redirect()->route('login')->with('errors', 'Admin Not Exists!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
         $imagename='';

        $image = $request->file('image');
        $imagename = time().'.'.$image->extension();

        $destinationPath = public_path('images');
        $image->move($destinationPath,$imagename);

        $post = [
            'title' => $request->title,
            'image'=>$imagename,
            'description' => $request->description
        ];
        //dd($post);
        $save = $this->blogRepository->saveBlog($post);
        //echo $save;exit;
        if($save){
            return  redirect()->route('blog.index')->with('success', 'Blog Added Successfully!');
        }else{
           return redirect()->back()->with('error','Blog Already Exists!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        $blog = $this->blogRepository->getBlog($id);
        if($blog){
            return view('Backend.Blog.edit',['blog'=>$blog]);
        }else{
            return redirect()->route('blog.index');
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
        
         $imagename='';
        if($request->file('image')!=""){
        $image = $request->file('image');
        $imagename = time().'.'.$image->extension();

        $destinationPath = public_path('images');
        $image->move($destinationPath,$imagename);
        }
         $post = [
            'title' => $request->title,
            'image'=>$imagename,
            'description' => $request->description
        ];
        $updateBlog = $this->blogRepository->updateBlog($post,$id);

        return redirect()->route('blog.index')->with('success', 'Blog Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = $this->blogRepository->deleteBlog($id);
        echo "Blog deleted successfully";

    }
   
}
?>