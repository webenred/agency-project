<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_uuid',
        'type',
        'code',
        'created_at',
        'invalidated_at',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_uuid', 'uuid');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'invalidated_at' => 'datetime',
    ];


    public $timestamps = false;
}
