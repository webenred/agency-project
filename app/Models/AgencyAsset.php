<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgencyAsset extends Model
{
    use HasFactory;

    protected $fillable = [
        'agency_id',
        'type',
        'path'
    ];
}
