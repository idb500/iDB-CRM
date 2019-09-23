<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketPriority extends Model
{
    protected $fillable = [
        'priority_name', 'color_code', 'created_by'
    ];
}
