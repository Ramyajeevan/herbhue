<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Backend\NewsletterRepository;
use DB;
Use Mail;

class NewsletterController extends Controller
{
    protected $newsletterRepository;

    public function __construct(NewsletterRepository $newsletterRepository)
    {
        $this->newsletterRepository = $newsletterRepository;
    }

    public function index(Request $request)
    {
        $email=$request->session()->get('username');
        $admin=DB::table("tbl_admin")->where("email",$email)->first();
        if($admin)
        {
            $emails = $this->newsletterRepository->getAllNewsletter();
            return view('Backend.Newsletter.index',["emails"=>$emails]);
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
            $emails = $this->newsletterRepository->getAllNewsletter();
            return view('Backend.Newsletter.add',["emails"=>$emails]);
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
    public function send(Request $request)
    {

     // dd($request);
     $email=$request->session()->get('username');
     $admin=DB::table("tbl_admin")->where("email",$email)->first();
     if($admin)
     {

        $emails=$request->emails;

       $message = "<p>Dear User,</p>";
       $message .= "<div style='width:100%;float:left;padding-right:10px;'>";
       $message .="<p>".$request->message."</p>";
       $message .= "</div>";
       $message .= "<br><p>Regards,</p><p>HERBHUE</p>";
       for($i=0;$i<count($emails);$i++)
       {
           $mail_sent = Parent::sendmail($message, env('APP_NAME').' Newsletter', env('MAIL_USERNAME'), env('APP_NAME'),$emails[$i],"User");
       }
        
       
            return redirect()->route('newsletter.index')->with('success', 'Newsletter Sent Successfully!');;
        }else{
           return redirect()->back()->with('errors', 'Error.');;
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
        $newsletter = $this->newsletterRepository->deleteNewsletter($id);
        echo "Newsletter deleted successfully";
    }
}
