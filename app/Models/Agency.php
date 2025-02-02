<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'networks',
    ];

    public $cast = [
        'networks' => 'array',
    ];


    public function coordinates() : HasMany {
        return $this->hasMany(Coordinate::class);
    }

    public $timestamps = false;
}
