<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Backend\BrandRepository;
use App\Models\Brand;
use DB;

class BrandController extends Controller
{
    protected $brandRepository;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
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
        $brand = $this->brandRepository->getAllBrand();

        return view('Backend.Brand.index', ['categories' => $brand]);
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
        return view('Backend.Brand.add');
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
            'image'=>$imagename
        ];
        //dd($post);
        $save = $this->brandRepository->saveBrand($post);
        //echo $save;exit;
        if($save){
            return  redirect()->route('brand.index')->with('success', 'Brand Added Successfully!');
        }else{
           return redirect()->back()->with('errors','Brand Already Exists!');
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
      
        $brand = $this->brandRepository->getBrand($id);
        if($brand){
            return view('Backend.Brand.edit',['brand'=>$brand]);
        }else{
            return redirect()->route('brand.index');
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
          $post = [
            'name' => $request->name
        ];
        
        $updateBrand = $this->brandRepository->updateBrand($post,$id);
        if($updateBrand)
        return redirect()->route('brand.index')->with('success', 'Brand Updated Successfully!');
        else{
            return redirect()->back()->with('errors','Brand Already Exists!');
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
        $brand = $this->brandRepository->deleteBrand($id);
        echo "Brand deleted successfully";

    }
    
}
?>