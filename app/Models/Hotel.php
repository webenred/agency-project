<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'coordinates',
        'classification',
        'number_rooms',
        'services',
        'address',
        'city',
        'country',
    ];

    public $cast = [
        'coordinates' => 'array',
        'services' => 'array',
    ];

    public function assets() : HasMany 
    {
        return $this->hasMany(HotelAsset::class);
    }
}
