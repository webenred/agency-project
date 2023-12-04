<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'sex',
        'dob',
        'phone',
        'email',
        'password',
        'role'
    ];


    public $incrementing = false;
    protected $primaryKey = 'uuid';

    public function hasRole($role)
    {
        switch ($role) {
            case 'admin':
                return $this->isAdmin();
                break;
            case 'partner':
                return $this->isPartner();
                break;
            default:
                return false;
                break;
        }
    }

    public function is_admin() {
        return $this->role === 'admin';
    }

    public function isClient() {
        return $this->role === 'client';
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
