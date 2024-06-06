<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiFasilitasPenunjang extends Model
{
    use HasFactory;

    protected $table = 'informasi_fasilitas_penunjang';
    protected $fillable = ['name', 'description', 'image'];
}
