<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelAsset extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'type',
        'path'
    ];
}
