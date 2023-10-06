<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
  
    
    public function dologin(Request $request)
    {
        //dd($request);
         $admin=DB::table("tbl_admin")->where("email",$request->email)->first();
       // dd($admin);
        if(isset($admin))
        {
           
            if($admin->password==$request->password)
            {
           
                    session()->put('username',$request->email);
                    return redirect()->route('dashboard')->with('success', 'Logined successfully!!');

            }
            else
            {
                 return redirect()->route('login')->with('errors', 'Invalid Password!');
            }
        }
        else
        {
            //echo "else";exit;
             return redirect()->route('login')->with('errors', 'Invalid Email!');
        }
           
          
    }
    
}
?>