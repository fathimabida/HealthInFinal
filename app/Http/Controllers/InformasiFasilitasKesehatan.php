<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RumahSakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class InformasiFasilitasKesehatan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $data = [
            'rs' => RumahSakit::all(),
        ];

        return view('Admin.list_rs.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('Admin.list_rs.form_tambah');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rumah_sakit' => 'required|string|max:255',
            'alamat' => 'required|string',
            'phone' => 'required|numeric',
            'link_maps' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max file size 2MB
        ]);

        // Simpan data ke dalam database
        RumahSakit::create([
            'rumah_sakit' => $request->rumah_sakit,
            'alamat' => $request->alamat,
            'phone' => $request->phone,
            'link_maps' => $request->link_maps,
            'foto' => $request->file('foto')->store('rumah_sakit', 'public'), // Simpan foto ke dalam folder public/fasilitas_foto
        ]);

        return redirect()->to('informasi_fasilitas_kesehatan')->with('success', 'Rumah Sakit berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //

        $data = [
            'rs' => RumahSakit::find($id)
        ];

        return view('Admin.list_rs.form_edit', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rumah_sakit' => 'required|string|max:255',
            'alamat' => 'required|string',
            'phone' => 'required|numeric',
            'link_maps' => 'required|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Max file size 2MB
        ]);

        // Temukan data fasilitas kesehatan berdasarkan ID
        $foto_rs = RumahSakit::findOrFail($id);

        // Simpan foto baru jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama dari penyimpanan jika ada
            if ($foto_rs->foto) {
                Storage::disk('public')->delete($foto_rs->foto);
            }

            // Simpan foto baru ke dalam folder public/fasilitas_foto
            $fotoPath = $request->file('foto')->store('rumah_sakit', 'public');

            // Update path foto
            $foto_rs->foto = $fotoPath;
        }

        // Update data lainnya
        $foto_rs->rumah_sakit = $request->rumah_sakit;
        $foto_rs->alamat = $request->alamat;
        $foto_rs->phone = $request->phone;
        $foto_rs->link_maps = $request->link_maps;
        $foto_rs->save();

        return redirect()->back()->with('success', 'Rumah sakit berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan data fasilitas kesehatan berdasarkan ID
        $rumah_sakit = RumahSakit::findOrFail($id);

        // Hapus foto dari penyimpanan
        if ($rumah_sakit->foto) {
            // Hapus foto dari penyimpanan
            Storage::disk('public')->delete($rumah_sakit->foto);
        }

        // Hapus data fasilitas kesehatan dari database
        $rumah_sakit->delete();

        return redirect()->back()->with('success', 'Rumah sakit berhasil dihapus.');
    }
}
