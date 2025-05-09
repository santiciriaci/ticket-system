<?php
namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TicketDocumentController extends Controller
{
    public function store(Request $request, Ticket $ticket)
    {
        $request->validate([
            'document' => 'required|file|max:10240', // 10 MB
            'description' => 'nullable|string|max:255',
        ]);

        $path = $request->file('document')->store('documents');

        TicketDocument::create([
            'ticket_id' => $ticket->id,
            'file_path' => $path,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Documento subido exitosamente.');
    }
}

