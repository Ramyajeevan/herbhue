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

             
        $token="eyJ0eXAiOiJKV1QiLCJub25jZSI6Il9ocVNTcVJWUmQ2U213ekdIUWp1RXJ2d1dyQjN4V0diMmdpR3NYMllaRGMiLCJhbGciOiJSUzI1NiIsIng1dCI6IjlHbW55RlBraGMzaE91UjIybXZTdmduTG83WSIsImtpZCI6IjlHbW55RlBraGMzaE91UjIybXZTdmduTG83WSJ9.eyJhdWQiOiIwMDAwMDAwMy0wMDAwLTAwMDAtYzAwMC0wMDAwMDAwMDAwMDAiLCJpc3MiOiJodHRwczovL3N0cy53aW5kb3dzLm5ldC8xMjFkZTM1OS0wM2FhLTRlMDktOGE0OC1hMTFhOWU1MGMyZjQvIiwiaWF0IjoxNzAwMjIzNDczLCJuYmYiOjE3MDAyMjM0NzMsImV4cCI6MTcwMDMxMDE3MywiYWNjdCI6MCwiYWNyIjoiMSIsImFpbyI6IkFWUUFxLzhWQUFBQUR5OXlZODJUakNNL0VubU1QSnlHV25OdktmVTNmeDZ1WS9RUEl0SHBDcWpjRzFUV3h1eEFPVERPWXJwdlA5MEduL0xLY1Q2MzFFUzJXSU96Ymtja3BRZ2FXVmtWa2t1dy90TkRxNEVuQzdBPSIsImFtciI6WyJwd2QiLCJtZmEiXSwiYXBwX2Rpc3BsYXluYW1lIjoiR3JhcGggRXhwbG9yZXIiLCJhcHBpZCI6ImRlOGJjOGI1LWQ5ZjktNDhiMS1hOGFkLWI3NDhkYTcyNTA2NCIsImFwcGlkYWNyIjoiMCIsImZhbWlseV9uYW1lIjoiU2VvIiwiZ2l2ZW5fbmFtZSI6InJhbWF5YSIsImlkdHlwIjoidXNlciIsImlwYWRkciI6IjI0MDU6MjAxOmUwMjQ6ZjBhOTo0MTU1OjhmMTA6Mjc0MToxYWExIiwibmFtZSI6InJhbWF5YSBTZW8iLCJvaWQiOiI3MjY0ZjllMi04NTA5LTRjNzMtODI3OS03ZjY3MjIwOGVlYWIiLCJwbGF0ZiI6IjMiLCJwdWlkIjoiMTAwMzIwMDMxMDhCNkQ2OSIsInJoIjoiMC5BYTRBV2VNZEVxb0RDVTZLU0tFYW5sREM5QU1BQUFBQUFBQUF3QUFBQUFBQUFBQ3VBRnMuIiwic2NwIjoiTWFpbC5TZW5kIG9wZW5pZCBwcm9maWxlIFVzZXIuUmVhZCBlbWFpbCIsInN1YiI6IktzeXlrYklCbkJsZ2hFSHNRb1FvRWctblhadUw4bnByWDFMZG83cUo4OGciLCJ0ZW5hbnRfcmVnaW9uX3Njb3BlIjoiRVUiLCJ0aWQiOiIxMjFkZTM1OS0wM2FhLTRlMDktOGE0OC1hMTFhOWU1MGMyZjQiLCJ1bmlxdWVfbmFtZSI6InJhbWF5YUBIZXJiSHVlLmNvbSIsInVwbiI6InJhbWF5YUBIZXJiSHVlLmNvbSIsInV0aSI6IlM5bm5WV3Rhb0VDUnMxVllfRVVrQUEiLCJ2ZXIiOiIxLjAiLCJ3aWRzIjpbIjcyOTgyN2UzLTljMTQtNDlmNy1iYjFiLTk2MDhmMTU2YmJiOCIsImYyZWY5OTJjLTNhZmItNDZiOS1iN2NmLWExMjZlZTc0YzQ1MSIsIjI5MjMyY2RmLTkzMjMtNDJmZC1hZGUyLTFkMDk3YWYzZTRkZSIsImI3OWZiZjRkLTNlZjktNDY4OS04MTQzLTc2YjE5NGU4NTUwOSJdLCJ4bXNfY2MiOlsiQ1AxIl0sInhtc19zc20iOiIxIiwieG1zX3N0Ijp7InN1YiI6InJpOUM4T09QSWlBSC1aWThlSVo5amtiSWVDcnZXVjUtOUhOS2lJZ05TekEifSwieG1zX3RjZHQiOjE2OTMyMzE2NDB9.bCnqMQrV4KC_oeUG0Sci2E98R3AXsIhkzklcAbHudnhkEpiok4AWjkIjGCztq2WUck3gaBhFQsNkPaGJnEXJAjh5-SkCaDIdu28BdjU2mdFf_ySaP4wuUz2aYugGFmtP0nUnhLJAuCR5LVLDzDAvskP6WqzuXn1nbPfz253oNy-gkW3lSo8Ht1X-2BKmoiFewHZ8Z7j-UKMczGhDyjJmb1WGjqBLZWlqzcxA-ZdRoD397pDOCw7AmEbukfO-2wBP2sIPiasGefnBk3gzS-HQBrrq2U2JzaEyow94OMCqtaOpywbgyKfOvbPeMeVvaTfbgmiU7Scu5lciPTTkYl_ZCg";
        
        $url = "https://graph.microsoft.com/v1.0/me/sendMail";
        $headers = array(
            'Content-Type: application/json',
            'Authorization: Bearer  '.$token
            );

        $curl = curl_init($url);
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
                    "content": "'.$content.'<br><p>Regards,</p><p>'.$from_name.'</p>"
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
       
       // dd($content, $subject, $from, $from_name, $to, $to_name);
       /* $data["email"] = $to;
        $data["title"] = $subject;
        $data["body"] = $content;
 
        
        $mail= Mail::send('emails.myTestMail', $data, function($message)use($data) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"]);

        });
        return $mail; */
        return $resp;
    }
}
?>