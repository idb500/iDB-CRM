<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'ticket_subject', 
        'ticket_description', 
        'ticket_priority', 
        'ticket_category', 
        'ticket_status',
        'created_by',
        'agent_id',
        'created_at',
        'updated_at',
        'completed_at'
    ];
}
