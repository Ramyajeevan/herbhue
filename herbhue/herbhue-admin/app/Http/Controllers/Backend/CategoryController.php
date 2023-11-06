<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Backend\CategoryRepository;
use App\Models\Category;
use DB;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
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
        $category = $this->categoryRepository->getAllCategory();

        return view('Backend.Category.index', ['categories' => $category]);
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
        {
        return view('Backend.Category.add');
        }
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
        $imagename = time().'-1.'.$image->extension();

        $destinationPath = public_path('images');
        $image->move($destinationPath,$imagename);
         $post = [
            'name' => $request->name,
            'image'=>$imagename,
            'description' => $request->description
        ];
        //dd($post);
        $save = $this->categoryRepository->saveCategory($post);
        //echo $save;exit;
        if($save){
            return  redirect()->route('category.index')->with('success', 'Category Added Successfully!');
        }else{
           return redirect()->back()->with('errors','Category Already Exists!');
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
      
        $category = $this->categoryRepository->getCategory($id);
        if($category){
            return view('Backend.Category.edit',['category'=>$category]);
        }else{
            return redirect()->route('category.index');
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
        if($request->file('image')!="")
        {
        $image = $request->file('image');
        $imagename = time().'-1.'.$image->extension();

        $destinationPath = public_path('images');
        $image->move($destinationPath,$imagename);
        }
        $post = [
            'name' => $request->name,
            'image'=>$imagename,
            'description' => $request->description
        ];
        
        $updateCategory = $this->categoryRepository->updateCategory($post,$id);
        if($updateCategory)
        return redirect()->route('category.index')->with('success', 'Category Updated Successfully!');
        else{
            return redirect()->back()->with('errors','Category Already Exists!');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->deleteCategory($id);
        echo "Category deleted successfully";

    }
    
}
?>