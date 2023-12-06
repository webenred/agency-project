<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'numbre_adult',
        'number_child',
        'number_baby',
        'departure_date',
        'arrived_date',
    ];
}
