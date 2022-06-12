<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'image', 'address', 'description', 'event_type',
        'available_tickets', 'event_date'
    ];
}
