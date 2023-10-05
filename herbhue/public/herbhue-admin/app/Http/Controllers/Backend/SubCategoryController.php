<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Backend\SubCategoryRepository;


class SubCategoryController extends Controller
{
    protected $subcategoryRepository;

    public function __construct(SubCategoryRepository $subcategoryRepository)
    {
        $this->subcategoryRepository = $subcategoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategory = $this->subcategoryRepository->getAllSubCategory();

        return view('Backend.SubCategory.index', ['subcategory' => $subcategory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      
        $category = $this->subcategoryRepository->getAllCategory();
        return view('Backend.SubCategory.add', ['category' => $category]);
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
            'category_id'=> $request->category_id,
            'name' => $request->name,
            'image'=>$imagename
        ];
        $save = $this->subcategoryRepository->saveSubCategory($post);

        if($save){
            return redirect()->route('subcategory.index')->with('success','Subcategory Added Successfully!');
        }else{
           return redirect()->back()->with('errors','Subcategory Already Exists!');
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
        $category = $this->subcategoryRepository->getAllCategory();
        $subcategory = $this->subcategoryRepository->getSubCategory($id);
        if($subcategory){
            return view('Backend.SubCategory.edit',['category'=>$category,'subcategory'=>$subcategory]);
        }else{
            return redirect()->route('subcategory.index');
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
      
        if($request->file('image')!="")
       {
          $imagename='';
      
  
          $image = $request->file('image');
          $imagename = time().'.'.$image->extension();

          $destinationPath = public_path('images');
          $image->move($destinationPath,$imagename);

           $post = [
              'category_id'=> $request->category_id,
            	'name' => $request->name,
              'image'=>$imagename
          ];
       }
       else
       {
           $post = [
            'category_id'=> $request->category_id,
            'name' => $request->name
        ];
       }
      
        $updateSubCategory = $this->subcategoryRepository->updateSubCategory($post,$id);

        return redirect()->route('subcategory.index')->with('success','Subcategory Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = $this->subcategoryRepository->deleteSubCategory($id);
        echo "SubCategory deleted successfully";
        //return redirect()->route('artistcategory.index');

    }
}
?>