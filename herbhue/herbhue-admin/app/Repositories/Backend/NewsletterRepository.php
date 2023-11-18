<?php

namespace App\Repositories\Backend;

use App\Models\Newsletter;
use App\Models\User;
use DB;
use App\Repositories\BaseRepository;
/**
 * Class UserRepository.
 */
class NewsletterRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Newsletter::class;
    }

    public function getAllNewsletter()
    {
        $newsletter = Newsletter::get();
        return $newsletter;
    }
   
    public function sendNewsletter($post)
    {
        $emails=$post["emails"];
        $letter=$post["message"];
        $message = "<p>Dear User,</p>";
        $message .= "<div style='width:100%;float:left;padding-right:10px;'>";
        $message .="<p>".$letter."</p>";
        $message .= "</div>";
        for($i=0;$i<count($emails);$i++)
        {
            $mail_sent = Parent::sendmail($message, env('APP_NAME').' Forgot Password', env('MAIL_USERNAME'), env('APP_NAME'),$emails[$i],"User");
        }
        return true;
       
    }

   

    public function deleteNewsletter($id)
    {
        try{
            $newsletter = Newsletter::find($id);
            if(isset($newsletter)){
                $newsletter->delete();
                DB::table('tbl_recommendation')->where("newsletter_id",$id)->delete();
            }else{
                return false;
            }
        }catch(\Exception $exception){
            report($exception);
        }

        return true;
    }

}
