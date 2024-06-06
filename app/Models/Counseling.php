<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counseling extends Model
{
    use HasFactory;

    protected $table = 'counselings';

    protected $fillable = [
        'id',
        'nama',
        'nim',
        'no_hp',
        'prodi',
        'konselor',
        'tanggal_konseling',
        'metode',
        'diagnosa',
        'deskripsi',
        'rekomendasi',
        'created_at',
        'updated_at'
    ];
}
