<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Bmi;

class BmiController extends Controller
{

    public function index()
    {
        $data = [
            'bmi' => Bmi::where('id_mahasiswa', auth()->user()->id)->orderBy('id', 'DESC')->get()
        ];

        return view('Mahasiswa.bmi', $data);

    }

    public function store(Request $request)
    {
        // Ambil data dari request
        $tinggi = $request->input('tinggi');
        $berat_badan = $request->input('berat_badan');
        $hasil_bmi = $request->input('hasil_bmi');

        // dd($hasil_bmi);

        $data = [
            'tinggi' => $tinggi,
            'berat_badan' => $berat_badan,
            'hasil_bmi' => $hasil_bmi,
            'id_mahasiswa' => auth()->user()->id
        ];

        Bmi::create($data);


        // Simpan ke database
        // $user = auth()->user(); // Pastikan user terautentikasi
        // $user->tinggi = $tinggi;
        // $user->berat_badan = $berat_badan;
        // $user->hasil_bmi = $request->hasil_bmi;
        // $user->save();

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Hasil BMI berhasil disimpan.');
    }


}
