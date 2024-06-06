<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Mahasiswa extends Authenticable
{
    use Notifiable;

    protected $table = 'mahasiswa';


    protected $guarded = [];


    protected $fillable = [
        'nim',
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}

