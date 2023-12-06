<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'coordinates',
        'classification',
        'number_rooms',
        'services',
        'country',
        'city',
        'address',
        'zip',
    ];

    public $cast = [
        'coordinates' => 'array',
    ];
}
