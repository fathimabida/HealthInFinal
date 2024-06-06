<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{

    public function index()
    {
        $data = [
            'artikel' => Artikel::all(),
        ];

        return view('Admin.artikel.content', $data);

    }

    public function create()
    {

        $data = [
        ];

        return view('Admin.artikel.tambah', $data);
    }

    public function show($id)
    {

        $data = [
            'artikel' => Artikel::find($id),
        ];

        return view('Admin.artikel.detail', $data);
    }

    public function store(Request $request)
    {

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'cover' => $request->file('cover')->store('cover_artikel', 'public'),
            // 'id_bidang_client' => $request->id_bidang_client,
        ];

        Artikel::create($data);

        return redirect()->route('admin.artikel')->with(['success' => 'Data artikel berhasil ditambahkan!']);
    }

    public function delete($id)
    {
        $data = Artikel::find($id);

        if ($data->cover) {
            // Hapus foto dari penyimpanan
            Storage::disk('public')->delete($data->cover);
        }

        // Hapus data fasilitas kesehatan dari database
        $data->delete();

        return redirect()->back()->with('success', 'Artikel berhasil dihapus.');
    }
}
