<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Backend\CouponRepository;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    protected $couponRepository;

    public function __construct(CouponRepository $couponRepository)
    {
        $this->couponRepository = $couponRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupon = $this->couponRepository->getAllCoupon();

        return view('Backend.Coupon.index', ['coupon' => $coupon]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('Backend.Coupon.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print_r($_REQUEST);print_r($_FILES);exit;
         $post = [
            'name' => $request->name,
            'coupon_type' => $request->coupon_type,
            'valid_from' => $request->valid_from,
            'valid_to' => $request->valid_to,
            'amount'=>$request->amount
        ];
        $save = $this->couponRepository->saveCoupon($post);
  
        if($save){
            return redirect()->route('coupon.index')->with('success','Coupon Added Successfully!');
        }else{
           return redirect()->back()->with('error','Coupon Already Exists!');
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
      
        $coupon = $this->couponRepository->getCoupon($id);
        if($coupon){
            return view('Backend.Coupon.edit',['coupon'=>$coupon]);
        }else{
            return redirect()->route('coupon.index');
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
             'name' => $request->name,
            'coupon_type' => $request->coupon_type,
            'valid_from' => $request->valid_from,
            'valid_to' => $request->valid_to,
            'amount'=>$request->amount
        ];
        
        $updateArtistCoupon = $this->couponRepository->updateCoupon($post,$id);

        return redirect()->route('coupon.index')->with('success','Coupon Updated Successfully!');;
    }
   	public function changeStatus(Request $request)
    {
        $coupon = DB::table('tbl_coupon')->where('id', $request->id)->get();
        $status = $request->status;
        $newstatus=0;
        if($status==1) $newstatus='0';
        if($status==0) $newstatus='1';
        if($coupon)
        {
		DB::table('tbl_coupon')->where('id', $request->id)->update(array('status' => $newstatus));
        echo "Status changed successfully";
        }
      	else
        {
          echo "error";
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
        $coupon = $this->couponRepository->deleteCoupon($id);
        echo "Coupon deleted successfully";

    }
}
?>