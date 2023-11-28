<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $email=$request->session()->get('username');
        $admin=DB::table("tbl_admin")->where("email",$email)->first();
        if($admin)
        {
            $total_customers=DB::table("tbl_user")->count();
            $products_sold=DB::table('tbl_order_products')->sum('quantity');
            $total_sales=DB::table('tbl_order')->sum('total');
            $current_month=date("m");
            $current_year=date("Y");
            $date=$current_year."-".$current_month."%";
            $month_earnings=DB::table('tbl_order')->where("added_date","like",$date)->sum('total');
            for($i=1;$i<=date("t");$i++)
            {
                $d=sprintf("%02d", $i);
                $date1=$current_year."-".$current_month."-".$d."%";
                $earnings[$i-1]= DB::table('tbl_order')->where("added_date","like",$date1)->sum('total');
            }
            $earnings=json_encode($earnings);
            return view('home',["total_customers"=>$total_customers,'products_sold'=>$products_sold,'total_sales'=>$total_sales,'month_earnings'=>$month_earnings,'earnings'=>$earnings]);
        }
        else
            return redirect()->route('login')->with('errors', 'Admin Not Exists!');    
    }
    
 
     public function logoutform(Request $request)
    {
       // dd($request);
        $email=$request->session()->get('username');
        $admin=DB::table("tbl_admin")->where("email",$email)->first();
        if($admin)
        {
       
        $request->session()->forget('username');
         DB::table("tbl_admin")->where("email",$email)->update(["status"=>"0"]);
        return redirect()->route('/');
        }
        else
            return redirect()->route('login')->with('errors', 'Admin Not Exists!');
    }
}
