<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Counseling;
use App\Models\Counselor;
use Illuminate\Pagination\LengthAwarePaginator;

class KonselingController extends Controller
{
    //controller untuk mahasiswa
    public function konseling()
    {
        $user = auth()->user();
        // Ambil NIM dari user yang sedang login
        $nim = $user->nim;
        
        // Ambil hasil konseling berdasarkan NIM
        $counselings = Counseling::where('nim', $nim)->get();
        return view('/mahasiswa/hasilKonseling', compact('counselings'));
    }

    //controller untuk konselor
    public function showCounseling(Request $request){
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if(strlen($katakunci)){
            $counselings = Counseling::where('nama', 'like', "%$katakunci%")
                        ->orWhere('nim', 'like', "%$katakunci%")
                        ->paginate($jumlahbaris);

        }else{
            $counselings = Counseling::paginate($jumlahbaris);
        }
            return view('/konselor/hasilKonseling', compact('counselings'));
    }

    public function createHasilKonseling()
    {
        $counselings = Counseling::all();
        $konselor = auth()->user();
        // Ambil Nama konselor dari user yang sedang login
        $nama_konselor = $konselor->nama;
        return view('/konselor/createHasilKonseling', compact('counselings', 'nama_konselor'));
    }

    public function store_counseling(Request $request)
    {
        // Validasi form
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'no_hp' => 'required',
            'prodi' => 'required',
            'konselor' => 'required',
            'tanggal_konseling' => 'required',
            'metode' => 'required',
            'diagnosa' => 'required',
            'deskripsi' => 'required',
            'rekomendasi' => 'required',
            
        ]);

        Counseling::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'no_hp' => $request->no_hp,
            'prodi' => $request->prodi,
            'konselor' => $request-> konselor,
            'tanggal_konseling' => $request-> tanggal_konseling,
            'metode' => $request-> metode,
            'diagnosa' => $request-> diagnosa,
            'deskripsi' => $request-> deskripsi,
            'rekomendasi' => $request-> rekomendasi,
        ]);
       
        return redirect('/konselor/hasilKonseling')->with('success', 'Hasil Konseling Berhasil Ditambahkan!'); 
    }

    //Detail hasil konseling untuk page mahasiswa
    public function showdetails($id){
        $counseling = Counseling::findOrFail($id);
        return view('/mahasiswa/detailHasilKonseling', compact('counseling'));
    }

    //Detail hasil konseling untuk page konselor
    public function detailHasilKonseling($id){

        $counseling = Counseling::findOrFail($id);
        $konselor = auth()->user();
        // Ambil Nama konselor dari user yang sedang login
        $nama_konselor = $konselor->nama;
        
        return view('/konselor/detailHasilKonseling', compact('counseling', 'nama_konselor'));
    }

    // public function deleteCounseling(string $id)
    // {
    //     $counseling = Counseling::select('id')->whereId($id)->first();
    //     $counseling->delete();

    //     return redirect('/konselor/hasilKonseling')->with('success', 'Hasil Konseling Berhasil Dihapuskan!'); 
    // }

    public function updateCounseling(Request $request, $id)
    {
        $counseling = Counseling::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'no_hp' => 'required',
            'prodi' => 'required',
            'konselor' => 'required',
            'tanggal_konseling' => 'required',
            'metode' => 'required',
            'diagnosa' => 'required',
            'deskripsi' => 'required',
            'rekomendasi' => 'required',
        ]);

        $data = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'no_hp' => $request->no_hp,
            'prodi' => $request->prodi,
            'konselor' => $request-> konselor,
            'tanggal_konseling' => $request-> tanggal_konseling,
            'metode' => $request-> metode,
            'diagnosa' => $request-> diagnosa,
            'deskripsi' => $request-> deskripsi,
            'rekomendasi' => $request-> rekomendasi,
        ];
        
        $counseling->update($data);

        return redirect('/konselor/hasilKonseling')->with('success', 'Data Hasil Konseling berhasil diperbarui!');
    }

}
