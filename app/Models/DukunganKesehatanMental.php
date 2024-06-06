<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DukunganKesehatanMental extends Model
{
    use HasFactory;

    protected $table = 'dukungan_kesehatan_mental';
    
    protected $fillable = ['section', 'judul_guideline', 'ciri_awal', 'pertolongan_pertama', 'harus_dihindari','url_guideline'];
}
