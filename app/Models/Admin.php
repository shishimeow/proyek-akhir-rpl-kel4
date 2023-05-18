<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $timestamps = false;
    public $fillable = [
        'username',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
