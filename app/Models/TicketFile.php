<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketFile extends Model
{
    use HasFactory;

    protected $table = 'ticket_file';
    protected $primaryKey = 'ticket_id';

    protected $fillable = ['ticket_id', 'file_path'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
