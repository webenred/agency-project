<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingTrip extends Model
{
    use HasFactory;

    protected $protected = [
        'booking_id',
        'type_chambre',
        'formule'
    ];
}
