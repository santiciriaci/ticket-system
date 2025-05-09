<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketDocument;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {   
        $notifications = Auth::user()->notifications; 

        $tickets = Ticket::where('user_id', Auth::id())->get();
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('tickets.create');
    }

     public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|integer',
            'transport_mode' => 'required|in:air,land,sea',
            'product' => 'required|string|max:255',
            'country_origin' => 'required|string|max:255',
            'country_destination' => 'required|string|max:255',
            'documents.*' => 'file|max:10240', // max 10 MB por archivo
        ]);


        $ticket = Ticket::create([
            'name' => $request->name,
            'type' => $request->type,
            'transport_mode' => $request->transport_mode,
            'product' => $request->product,
            'country_origin' => $request->country_origin,
            'country_destination' => $request->country_destination,
            'user_id' => auth()->id(),  // Asumiendo que el usuario está autenticado
            'status' => 'new',
        ]);

        // NO ME FUNCIONO LA SUBIDA DE ARCHIVOS, 
        // if ($request->hasFile('documents')) {
        //     foreach ($request->file('documents') as $file) {
        //         $path = $file->store('documents');
        //         \App\Models\TicketDocument::create([
        //             'ticket_id' => $ticket->id,
        //             'file_path' => $path,
        //             'description' => null,
        //         ]);
        //     }
        // }

        return redirect()->route('tickets.index'); 
    }

    public function upload(Request $request, Ticket $ticket)
{
    $request->validate([
        'document' => 'required|file|max:10240', // máx 10MB
    ]);

    $path = $request->file('document')->store('documents', 'public');

    TicketDocument::create([
        'ticket_id' => $ticket->id,
        'file_path' => $path,
    ]);

    return back();
}

}
