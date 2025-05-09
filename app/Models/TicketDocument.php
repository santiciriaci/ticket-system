<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'file_path',
        'description',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
