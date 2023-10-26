<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Backend\TicketRepository;
use DB;

class TicketController extends Controller
{
    protected $ticketRepository;

    public function __construct(TicketRepository $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticket = $this->ticketRepository->getAllTicket();
		 return view('Backend.Ticket.index', ['ticket' => $ticket]);
    }


    public function edit($id)
    {
       $ticket = $this->ticketRepository->getTicket($id);
        if($ticket)
        {
             return view('Backend.Ticket.edit',['ticket'=>$ticket]);
        }else{
            return redirect()->route('ticket.index');
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
            'status'=>$request->status,
            'reply'=>$request->reply
        ];
        $updateTicket = $this->ticketRepository->updateTicket($post,$id);
        return redirect()->route('ticket.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = $this->ticketRepository->deleteTicket($id);
        echo "Ticket deleted successfully";

    }
}
?>