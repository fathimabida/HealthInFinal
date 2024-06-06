<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counselor extends Model
{
    use HasFactory;

    protected $table = 'counselors';

    protected $fillable = [
        'id',
        'nama_konselor',
        'spesialis',
        'jam_kerja',
        'metode_konsultasi',
        'no_hp',
        'photo',
        'gender',
    ];
}
