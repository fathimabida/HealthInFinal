<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilMcu extends Model 
{
    use HasFactory;

<<<<<<< HEAD
    protected $table = 'hasil_mcu';
    protected $fillable = ['nama_pasien', 'nama_pemeriksaan', 'hasil'];
}
=======
    protected $fillable = [
        'nama_pasien',
        'nama_pemeriksaan',
        'hasil',
    ];
}
>>>>>>> 9ea61cba467d24a9720bc089d806cc0a6a2c065e
