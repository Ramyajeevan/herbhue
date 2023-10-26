<?php

namespace App\Repositories\Backend;


use App\Models\Contact;
use App\Repositories\BaseRepository;

use Illuminate\Support\Facades\DB;

/**
 * Class TicketRepository.
 */
class TicketRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Contact::class;
    }

    public function getAllTicket()
    {
        $ticket = Contact::get();
        return $ticket;
    }
  
    public function getTicket($id)
    {
        $ticket = Contact::findOrFail($id);
      //dd($ticket->user_id);
         if(isset($ticket)){
         
        return $ticket;
        }else{
            return false;
        }
    }

    public function updateTicket($post,$id)
    {
      $ticket = Contact::find($id);
      //  dd($ticketproducts);
       if(isset($ticket))
       {
            $ticket->status = $post['status'];
            $ticket->reply = $post['reply'];
            $ticket->save();
            return $ticket;
        }else{
            return false;
        }
     // return $ticket;
    }
    
   
    public function deleteTicket($id)
    {
        try{
            $ticket = Contact::find($id);
            if(isset($ticket)){
              
             $ticket->delete();
            }else{
                return false;
            }
        }catch(\Exception $exception){
            report($exception);
        }

        return true;
    }
	
}
?>