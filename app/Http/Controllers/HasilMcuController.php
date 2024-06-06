<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\HasilMcu;

class HasilMcuController extends Controller
{

    public function indexmhs()
    {
        $mcu_results = HasilMcu::orderBy('nama_pasien')->get();
        return view('Mahasiswa.hasil_mcu', compact('mcu_results'));
    }

    public function indexdtr()
    {
        $mcu_results = HasilMcu::orderBy('nama_pasien')->get();
        return view('Dokter.hasil_mcu', compact('mcu_results'));
    }

    public function indexprwt()
    {
        $hasil_mcu = HasilMcu::orderBy('nama_pasien')->get();
        return view('Employee.HasilMcu.index', compact('hasil_mcu'));
    }

    public function index()
    {
        $hasil_mcu = HasilMcu::all();
        return view('hasil_mcu.index', compact('hasil_mcu'));

    }

    public function create()
    {
        return view('hasil_mcu.create');
    }

    public function store(Request $request)
    {
    $request->validate([
        'nama_pasien' => 'required',
        'nama_pemeriksaan' => 'required',
        'hasil' => 'required|in:Negatif,Positif',
    ]);

    HasilMcu::create([
        'nama_pasien' => $request->nama_pasien,
        'nama_pemeriksaan' => $request->nama_pemeriksaan,
        'hasil' => $request->hasil,
    ]);

    return redirect()->route('Employee.HasilMcu.index')
        ->with('success', 'Hasil MCU berhasil ditambahkan.');
        $request->validate([
            'nama_pasien' => 'required',
            'nama_pemeriksaan' => 'required',
            'hasil' => 'required|in:Negatif,Positif',
        ]);

        HasilMcu::create($request->all());

        return redirect()->route('hasil_mcu.index')
            ->with('success', 'Hasil MCU berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $hasil = HasilMcu::findOrFail($id);
        return view('hasil_mcu.edit', compact('hasil'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pasien' => 'required',
            'nama_pemeriksaan' => 'required',
            'hasil' => 'required|in:Negatif,Positif',
        ]);

        $hasil = HasilMcu::findOrFail($id);
        $hasil->update($request->all());

        return redirect()->route('hasil_mcu.index')
            ->with('success', 'Hasil MCU berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $hasil = HasilMcu::findOrFail($id);
        $hasil->delete();

        return redirect()->route('hasil_mcu.index')
            ->with('success', 'Hasil MCU berhasil dihapus.');
    }
}