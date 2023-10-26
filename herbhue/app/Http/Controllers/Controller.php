<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function sendmail($content, $subject, $from, $from_name, $to, $to_name)
    {
        
       // dd($content, $subject, $from, $from_name, $to, $to_name);
        $data["email"] = $to;
        $data["title"] = $subject;
        $data["body"] = $content;
 
        
        $mail= Mail::send('emails.myTestMail', $data, function($message)use($data) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"]);

        });
        return $mail;
    }
}
?>