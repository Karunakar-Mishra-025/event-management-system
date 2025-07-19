<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'venue',
        'event_date',
        'member_amount',
        'nonmember_amount',
    ];
    use HasFactory;
}
