<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Notifications\TicketStatusChanged;

class AgentController extends Controller
{
    public function index()
    {
        
        $tickets = Ticket::whereIn('status', ['new','in_progress'])->get();;  

        return view('agent.tickets.index', compact('tickets'));
    }


    public function update(Request $request, $id)
    {
       
        $request->validate([
            'status' => 'required|in:open,in_progress,completed',
        ]);

     
        $ticket = Ticket::findOrFail($id);


        $ticket->status = $request->status;
        $ticket->save();

        $ticket->user->notify(new TicketStatusChanged($ticket));


        return redirect()->route('agent.tickets.index')->with('success', 'Estado del ticket actualizado');
    }
}
