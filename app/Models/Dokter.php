<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Dokter extends Authenticable
{
    use Notifiable;

    protected $guard = 'dokter' ;

    protected $fillable = [
        'dokter_id', 'name', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];
}
