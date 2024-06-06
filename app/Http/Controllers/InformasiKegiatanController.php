<?php

namespace App\Http\Controllers;

use App\Models\InformasiKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class InformasiKegiatanController extends Controller
{
    public function mahasiswaIndex()
    {
    $kegiatan = InformasiKegiatan::all();
    return view('Mahasiswa.InformasiKegiatan', compact('kegiatan'));
    }       
    public function index()
    {
        $kegiatan = InformasiKegiatan::all();
        return view('Admin.InformasiKegiatan.index', compact('kegiatan'));
    }

    public function create()
    {
        return view('Admin.InformasiKegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'lokasi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan gambar ke penyimpanan
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('public/images');
        } else {
            $gambarPath = null;
            Log::error('Gambar tidak ditemukan dalam request.');
        }

        // Simpan data
        InformasiKegiatan::create([
            'nama_kegiatan' => $request->get('nama_kegiatan'),
            'deskripsi' => $request->get('deskripsi'),
            'tanggal' => $request->get('tanggal'),
            'lokasi' => $request->get('lokasi'),
            'image' => $gambarPath,
        ]);

        return redirect()->route('Admin.InformasiKegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan');
    }

    public function destroy(InformasiKegiatan $informasi_kegiatan)
    {
        if ($informasi_kegiatan->image) {
            Storage::delete($informasi_kegiatan->image);
        }

        $informasi_kegiatan->delete();
        return redirect()->route('Admin.InformasiKegiatan.index')->with('success', 'Kegiatan berhasil dihapus');
    }
}
