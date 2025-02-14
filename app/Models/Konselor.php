<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Konselor extends Authenticable
{
    use Notifiable;

    protected $guard = 'konselor' ;

    protected $fillable = [
        'konselor_id', 'name', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];
}

