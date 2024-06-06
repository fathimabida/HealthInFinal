<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GaleriKesehatan;
use Illuminate\Support\Facades\Storage;

class GaleriKesehatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = [
            'galeri' => GaleriKesehatan::all(),
        ];

        return view('Admin.galeri_fasilitas_kesehatan.list_galeri_kesehatan', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('Admin.galeri_fasilitas_kesehatan.form_tambah');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max file size 2MB
        ]);

        // Simpan data ke dalam database
        GaleriKesehatan::create([
            'nama_fasilitas' => $request->nama_fasilitas,
            'deskripsi' => $request->deskripsi,
            'foto' => $request->file('foto')->store('fasilitas_foto', 'public'), // Simpan foto ke dalam folder public/fasilitas_foto
        ]);

        return redirect()->to('galeri_kesehatan')->with('success', 'Galeri fasilitas kesehatan berhasil ditambahkan.');
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

        $data = [
            'galeri' => GaleriKesehatan::find($id)
        ];

        return view('Admin.galeri_fasilitas_kesehatan.form_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Max file size 2MB
        ]);

        // Temukan data fasilitas kesehatan berdasarkan ID
        $fasilitasKesehatan = GaleriKesehatan::findOrFail($id);

        // Simpan foto baru jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama dari penyimpanan jika ada
            if ($fasilitasKesehatan->foto) {
                Storage::disk('public')->delete($fasilitasKesehatan->foto);
            }

            // Simpan foto baru ke dalam folder public/fasilitas_foto
            $fotoPath = $request->file('foto')->store('fasilitas_foto', 'public');

            // Update path foto
            $fasilitasKesehatan->foto = $fotoPath;
        }

        // Update data lainnya
        $fasilitasKesehatan->nama_fasilitas = $request->nama_fasilitas;
        $fasilitasKesehatan->deskripsi = $request->deskripsi;
        $fasilitasKesehatan->save();

        return redirect()->back()->with('success', 'Galeri fasilitas kesehatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan data fasilitas kesehatan berdasarkan ID
        $fasilitasKesehatan = GaleriKesehatan::findOrFail($id);

        // Hapus foto dari penyimpanan
        if ($fasilitasKesehatan->foto) {
            // Hapus foto dari penyimpanan
            Storage::disk('public')->delete($fasilitasKesehatan->foto);
        }

        // Hapus data fasilitas kesehatan dari database
        $fasilitasKesehatan->delete();

        return redirect()->back()->with('success', 'Fasilitas kesehatan berhasil dihapus.');
    }

}
