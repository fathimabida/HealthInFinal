<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticable
{
    use Notifiable;

    protected $table = 'admins' ;

    protected $fillable = [
        'admin_id', 'name', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];
}
