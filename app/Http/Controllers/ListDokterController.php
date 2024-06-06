<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\File;

class ListDokterController extends Controller
{
    public function doctors(Request $request){
        $name = $request->name;
        $specialist = $request->specialist;
        $gender = $request->gender;

        $doctors = Doctor::query();

        if(strlen($name)) {
            $doctors->where('name', 'like', "%$name%");
        }
        if(strlen($specialist)) {
            $doctors->where('specialist', 'like', "%$specialist%");
        }
        if(strlen($gender)) {
            $doctors->where('gender', $gender);
        }
        $doctors = $doctors->get();

        if ($doctors->isEmpty()) {
            // notifikasi jika tidak ada hasil
            session()->flash('message', 'Dokter tidak tersedia');
        }

        if ($request->has('reset')) {
            // Hapus notifikasi dari sesi jika tombol reset ditekan
            $request->session()->forget('message');
        }
        
        return view('mahasiswa/listdokter', compact('doctors'));
    }


    public function viewlistdoctor(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if (strlen($katakunci)) {
            $doctors = Doctor::where('name', 'like', "%$katakunci%")
                ->orWhere('specialist', 'like', "%$katakunci%")
                ->orWhere('gender', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);

        } else {
            $doctors = Doctor::paginate($jumlahbaris);
        }
        return view('admin/ListDokter/listDokterA', compact('doctors'));
    }

    public function createListDoctor()
    {
        $doctors = Doctor::all();
        return view('admin/ListDokter/CreateListDokter', compact('doctors'));
    }

    public function store_doctor(Request $request)
    {
        // Validasi form
        $request->validate([
            'name' => 'required',
            'specialist' => 'required',
            'operational_hour' => 'required',
            'gender' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $photo = time() . '-' . $request->photo->getClientOriginalName();
        $request->photo->move('asset', $photo);

        // Simpan data ke database
        Doctor::create([
            'name' => $request->name,
            'specialist' => $request->specialist,
            'operational_hour' => $request->operational_hour,
            'gender' => $request->gender,
            'photo' => $photo,
        ]);

        return redirect('/listDokterA')->with('success', 'Dokter Berhasil Ditambahkan!');
    }

    public function deleteDoctor(string $id)
    {
        $doctor = Doctor::select('id')->whereId($id)->first();
        $doctor->delete();

        return redirect('/listDokterA')->with('success', 'Dokter Berhasil Dihapuskan!');
    }

    public function editDoctor(string $id)
    {
        $doctors = Doctor::select('*')->whereId($id)->firstOrFail();
        // $subcategories = Subcategory::all();
        return view('admin/listDokter/UpdateListDokter', compact('doctors'));
    }

    public function updateDoctor(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'specialist' => 'required',
            'operational_hour' => 'required',
            'gender' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'specialist' => $request->specialist,
            'operational_hour' => $request->operational_hour,
            'gender' => $request->gender,
        ];

        $doctor = Doctor::select('photo', 'id')->whereId($id)->first();
        if ($request->photo) {
            File::delete('asset' . $doctor->photo);

            $photo = time() . '-' . $request->photo->getClientOriginalName();
            $request->photo->move('asset', $photo);

            $data['photo'] = $photo;
        }

        $doctor->update($data);

        return redirect('/listDokterA')->with('success', 'Data Dokter berhasil diperbarui!');
    }
}
