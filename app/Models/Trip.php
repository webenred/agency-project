<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'destination',
        'price_adult',
        'price_chile',
        'price_baby',
        'reduction'
    ];
}
