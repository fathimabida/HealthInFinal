<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\InformasiFasilitasPenunjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiFasilitasPenunjangController extends Controller
{
    public function indexmhs()
    {
        $facilities = InformasiFasilitasPenunjang::all();
        return view('Mahasiswa.InformasiFasilitasPenunjang', compact('facilities'));
    }

    public function index()
    {
        $facilities = InformasiFasilitasPenunjang::all();
        return view('Admin.InformasiFasilitasPenunjang.index', compact('facilities'));
    }

    public function create()
    {
        return view('Admin.InformasiFasilitasPenunjang.create');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan gambar
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images', $imageName);

        // Simpan data
        InformasiFasilitasPenunjang::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('Admin.InformasiFasilitasPenunjang.index')->with('success', 'Informasi fasilitas penunjang berhasil ditambahkan.');
    }

    public function edit(InformasiFasilitasPenunjang $informasi)
    {
        return view('Admin.InformasiFasilitasPenunjang.edit', compact('informasi'));
    }

    public function update(Request $request, InformasiFasilitasPenunjang $informasi)
    {
        // Validasi data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Jika ada gambar baru diunggah, simpan gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            Storage::delete('public/images/' . $informasi->image);

            // Simpan gambar baru
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images', $imageName);

        } else {
            // Jika tidak ada gambar baru diunggah, gunakan gambar yang lama
            $imageName = $informasi->image;
        }

        // Update data
        $informasi->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('Admin.InformasiFasilitasPenunjang.index')->with('success', 'Informasi fasilitas penunjang berhasil diperbarui.');
    }

    public function destroy(InformasiFasilitasPenunjang $informasi)
    {
        // Hapus gambar terkait
        Storage::delete('public/images/' . $informasi->image);

        // Hapus data dari database
        $informasi->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('Admin.InformasiFasilitasPenunjang.index')->with('success', 'Informasi fasilitas penunjang berhasil dihapus.');
    }
}
