<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Backend\BannerRepository;
use DB;

class BannerController extends Controller
{
    protected $bannerRepository;

    public function __construct(BannerRepository $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
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
        $banner = $this->bannerRepository->getAllBanner();

        return view('Backend.Banner.index', ['banners' => $banner]);
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
            return view('Backend.Banner.add');
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
       // print_r($_REQUEST);print_r($_FILES);exit;
       if($request->image!="")
       {
	    $imageName = time().'.'.$request->image->extension();  
     
        $request->image->move(public_path('images'), $imageName);
        
       
        $save = $this->bannerRepository->saveBanner($imageName);
   
            return redirect()->route('banner.index')->with('success', 'Banner Added Successfully!');;
        }else{
           return redirect()->back()->with('errors', 'Choose the Image of the banner!');;
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
      
        $banner = $this->bannerRepository->getBanner($id);
        if($banner){
            return view('Backend.Banner.edit',['banner'=>$banner]);
        }else{
            return redirect()->route('Banner.index');
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
        if($request->image!="")
       {
	    $imageName = time().'.'.$request->image->extension();  
     
        $request->image->move(public_path('images'), $imageName);
        $updatebanner = $this->bannerRepository->updateBanner($imageName,$id);
        return redirect()->route('banner.index')->with('success', 'Banner Updated Successfully!');;
       }
        else{
           return redirect()->back()->with('errors', 'Choose the Banner Image!');
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
        $banner = $this->bannerRepository->deleteBanner($id);
        echo "Banner deleted successfully";
    }
}
