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
             return view('home');
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
