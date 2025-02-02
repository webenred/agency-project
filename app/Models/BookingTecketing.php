<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingTecketing extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'flight_type',
        'departure_airport',
        'arrived_airport',
        'compagnie',
        'class'
    ];
    
}
