<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use Illuminate\Support\Facades\Storage;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $data = [
            'obat' => Obat::all(),
        ];

        return view('Admin.obat.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Admin.obat.form_tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'dosis' => 'required|string',
            'aturan_pakai' => 'required|string',
            'efek_samping' => 'required|string',
            'nomor_registrasi' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max file size 2MB
        ]);

        // Simpan data ke dalam database
        Obat::create([
            'judul' => $request->judul,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'dosis' => $request->dosis,
            'aturan_pakai' => $request->aturan_pakai,
            'efek_samping' => $request->efek_samping,
            'nomor_registrasi' => $request->nomor_registrasi,
            'foto' => $request->file('foto')->store('foto_obat', 'public'), // Simpan foto ke dalam folder public/fasilitas_foto
        ]);

        return redirect()->to('obat')->with('success', 'Rekomendasi obat berhasil ditambahkan.');
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
            'obat' => Obat::find($id)
        ];

        return view('Admin.obat.form_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'dosis' => 'required|string',
            'aturan_pakai' => 'required|string',
            'efek_samping' => 'required|string',
            'nomor_registrasi' => 'required|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Max file size 2MB
        ]);


        // Temukan data fasilitas kesehatan berdasarkan ID
        $obat = Obat::findOrFail($id);

        // Simpan foto baru jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama dari penyimpanan jika ada
            if ($obat->foto) {
                Storage::disk('public')->delete($obat->foto);
            }

            // Simpan foto baru ke dalam folder public/fasilitas_foto
            $fotoPath = $request->file('foto')->store('foto_obat', 'public');

            // Update path foto
            $obat->foto = $fotoPath;
        }

        // Update data lainnya
        $obat->judul = $request->judul;
        $obat->harga = $request->harga;
        $obat->dosis = $request->dosis;
        $obat->deskripsi = $request->deskripsi;
        $obat->aturan_pakai = $request->aturan_pakai;
        $obat->nomor_registrasi = $request->nomor_registrasi;
        $obat->efek_samping = $request->efek_samping;
        $obat->save();

        return redirect()->back()->with('success', 'Rekomendasi obat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         // Temukan data fasilitas kesehatan berdasarkan ID
         $obat = Obat::findOrFail($id);

         // Hapus foto dari penyimpanan
         if ($obat->foto) {
             // Hapus foto dari penyimpanan
             Storage::disk('public')->delete($obat->foto);
         }
 
         // Hapus data fasilitas kesehatan dari database
         $obat->delete();
 
         return redirect()->back()->with('success', 'Rekomendasi obat berhasil dihapus.');
    }
}
