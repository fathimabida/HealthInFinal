<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratRujukan extends Model
{
    use HasFactory;

    protected $table = 'surat_rujukan';
    
    protected $fillable = ['dokter_rujukan', 'rs_rujukan', 'dokter_perujuk', 'tgl_rujuk', 'nim_pasien','nama_pasien', 'diagnosa', 'masa_berlaku', 'file_surat'];
}
