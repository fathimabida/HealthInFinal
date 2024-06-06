<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Counselor;
use Illuminate\Support\Facades\File;

class ListKonselorController extends Controller
{
    public function counselors(Request $request){
        $nama_konselor = $request->nama_konselor;
        $spesialis = $request->spesialis;
        $gender = $request->gender;
        $metode_konsultasi = $request->metode_konsultasi;

        $counselors = Counselor::query();

        if(strlen($nama_konselor)) {
            $counselors->where('nama_konselor', 'like', "%$nama_konselor%");
        }
        if(strlen($spesialis)) {
            $counselors->where('spesialis', 'like', "%$spesialis%");
        }
        if(strlen($gender)) {
            $counselors->where('gender', $gender);
        }
        if(strlen($metode_konsultasi)) {
            $counselors->where('metode_konsultasi',  'like', "%$metode_konsultasi%");
        }
        $counselors = $counselors->get();

        if ($counselors->isEmpty()) {
            // notifikasi jika tidak ada hasil
            session()->flash('message', 'Konselor tidak tersedia');
        }

        if ($request->has('reset')) {
            // Hapus notifikasi dari sesi jika tombol reset ditekan
            $request->session()->forget('message');
        }

        return view('mahasiswa/listKonselor', compact('counselors'));
    }

    public function viewlistCounselor(Request $request){
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if(strlen($katakunci)){
            $counselors = Counselor::where('nama_konselor', 'like', "%$katakunci%")
                        ->orWhere('spesialis', 'like', "%$katakunci%")
                        ->orWhere('gender', 'like', "%$katakunci%")
                        ->paginate($jumlahbaris);

        }else{
            $counselors = Counselor::paginate($jumlahbaris);
        }
            return view('admin/listKonselor/listKonselorA', compact('counselors'));
    }

    public function createListCounselor()
    {
        $counselors = Counselor::all();
        return view('admin/listKonselor/CreatelistKonselor', compact('counselors'));
    }

     public function store_Counselor(Request $request)
    {
        // Validasi form
        $request->validate([
            'nama_konselor' => 'required',
            'spesialis' => 'required',
            'no_hp' => 'required',
            'metode_konsultasi' => 'required',
            'jam_kerja' => 'required',
            'gender' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

            $photo = time() .'-' .$request->photo->getClientOriginalName();
            $request->photo->move('asset', $photo);

        // Simpan data ke database
        Counselor::create([
            'nama_konselor' => $request->nama_konselor,
            'no_hp' => $request->no_hp,
            'spesialis' => $request->spesialis,
            'metode_konsultasi' => $request->metode_konsultasi,
            'jam_kerja' => $request-> jam_kerja,
            'gender' => $request->gender,
            'photo' => $photo,
        ]);
       
        return redirect('/listKonselorA')->with('success', 'Konselor Berhasil Ditambahkan!'); 
    }

    public function deleteCounselor(string $id)
    {
        $Counselor = Counselor::select('id')->whereId($id)->first();
        $Counselor->delete();

        return redirect('/listKonselorA')->with('success', 'Konselor Berhasil Dihapuskan!'); 
    }

    public function editCounselor(string $id)
    {
        $counselors = Counselor::select('*')->whereId($id)->firstOrFail();
        // $subcategories = Subcategory::all();
        return view('admin/listKonselor/UpdatelistKonselor', compact('counselors'));
    }

    public function updateCounselor(Request $request, $id)
    {
        $request->validate([
            'nama_konselor' => 'required',
            'spesialis' => 'required',
            'no_hp' => 'required',
            'metode_konsultasi' => 'required',
            'jam_kerja' => 'required',
            'gender' => 'required',
        ]);

        $data = [
            'nama_konselor' => $request->nama_konselor,
            'no_hp' => $request->no_hp,
            'spesialis' => $request->spesialis,
            'metode_konsultasi' => $request->metode_konsultasi,
            'jam_kerja' => $request-> jam_kerja,
            'gender' => $request->gender,
            
        ];

        $Counselor = Counselor::select('photo', 'id')->whereId($id)->first();
        if ($request->photo) {
            File::delete('asset' .$Counselor->photo);

            $photo = time() . '-' . $request->photo->getClientOriginalnama_konselor();
            $request->photo->move('asset', $photo);

            $data['photo'] = $photo;
        }

        $Counselor->update($data);

        return redirect('/listKonselorA')->with('success', 'Data Konselor berhasil diperbarui!');
    }
}
