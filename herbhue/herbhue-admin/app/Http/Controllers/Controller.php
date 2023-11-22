<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Mail;
use GuzzleHttp\client;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function sendmail($content, $subject, $from, $from_name, $to, $to_name)
    {
       // dd($content);


       $url="https://login.microsoftonline.com/121de359-03aa-4e09-8a48-a11a9e50c2f4/oauth2/v2.0/token";
      
        $data_array =  array(
        "client_id"        => "4d031d4c-0579-45cd-b38e-7581c1d01ac7",
        "scope"=>"https://graph.microsoft.com/.default",
        "client_secret"=>"4Eg8Q~tqDeshRu6P1jZWJPCtpGq-lXbF~vNCpcgD",
        "grant_type"=>"client_credentials"
        );


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data_array));
        $response = curl_exec($ch);
        $result = json_decode($response);
       curl_close($ch); // Close the connection
        //print_r($result);
        $token=$result->access_token;
        
       
       // dd($content, $subject, $from, $from_name, $to, $to_name);
       /* $data["email"] = $to;
        $data["title"] = $subject;
        $data["body"] = $content;
 
        
        $mail= Mail::send('emails.myTestMail', $data, function($message)use($data) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"]);

        });
        return $mail; */
        $url = "https://graph.microsoft.com/v1.0//users/Accounts@HerbHue.com/sendMail";
        $headers = array(
            'Content-Type: application/json',
            'Authorization: Bearer  '.$token
            );

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//print_r($content);
         $data='{
            "message": {
                "subject": "'.$subject.'",
                "body": {
                    "contentType": "HTML",
                    "content": "'.$content.'",
                },
                "toRecipients": [
                    {
                        "emailAddress": {
                            "address": "'.$to.'"
                        }
                    }
                ]
            }
        }';
         curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
         
 
         
         $resp = curl_exec($curl);
         curl_close($curl);
       
        return $resp;
    }
}
?>