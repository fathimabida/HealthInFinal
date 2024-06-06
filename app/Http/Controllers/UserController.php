<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\GaleriKesehatan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Artikel;
use App\Models\Doctor;
use App\Models\JanjiTemu;
use App\Models\Mahasiswa;
use App\Models\Obat;
use App\Models\Employee;
use App\Models\RumahSakit;
use App\Models\ProfilKesehatan;

class UserController extends Controller
{
    public function admin()
    {
        return view('Admin.admin');
    }

    public function mahasiswa()
    {
        $id = auth()->user()->id;
        $profil_kesehatan = ProfilKesehatan::where('id', $id)->first();

        if(is_null($profil_kesehatan)){

            $data_add = [
                'id_mahasiswa' => $id
            ];

            ProfilKesehatan::create($data_add);
        }


        $mahasiswa = Mahasiswa::find($id);

        $janji_temu = JanjiTemu::where('id', $id)->get();


        // dd($profil_kesehatan->count());

        $data = [
            'mahasiswa' => $mahasiswa,
            'profil_kesehatan' => $profil_kesehatan,
            'janji_temu' => $janji_temu
        ];

        return view('Mahasiswa.beranda', $data);
    }

    public function updateProfileMhs(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nim' => 'required|numeric|unique:mahasiswa,nim,' . $request->user()->id,
            'email' => 'required|email|max:255|unique:mahasiswa,email,' . $request->user()->id,
            'ttl' => 'required|date',
            'password' => 'nullable|string|min:8',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4048',
        ]);

        // Jika validasi gagal, kembalikan dengan pesan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update mahasiswa, Ambil mahasiswa yang sedang login
        $mahasiswa = $request->user();

        // dd($mahasiswa);

        // Update profil mahasiswa
        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->nim = $request->input('nim');
        $mahasiswa->email = $request->input('email');
        $mahasiswa->ttl = $request->input('ttl');

        // Jika password diisi, update password
        if ($request->input('password') != "") {
            $mahasiswa->password = bcrypt($request->input('password'));
            // dd('adapw');
        }

        // Jika ada file foto diupload, simpan foto baru
        if ($request->hasFile('foto')) {

            if ($mahasiswa->foto) {
                Storage::disk('public')->delete($mahasiswa->foto);
            }

            $fotoPath = $request->file('foto')->store('foto_profil', 'public');
            $mahasiswa->foto = $fotoPath;
        }

        // Jika ada file background diupload, simpan foto baru
        if ($request->hasFile('background_image')) {

            if ($mahasiswa->background_image) {
                Storage::disk('public')->delete($mahasiswa->background_image);
            }

            $bgPath = $request->file('background_image')->store('background_image', 'public');
            $mahasiswa->background_image = $bgPath;
        }

        // Simpan perubahan
        $mahasiswa->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');


        return view('Mahasiswa.beranda');

    }

    public function employee()
    {

        // dd(auth()->user()->id);

        $id_dokter = Employee::find(auth()->user()->id);

        $id_dokter = $id_dokter->id_dokter;

        $janji_temu = JanjiTemu::where('id_dokter', $id_dokter)->get();
        $profil_kesehatan = ProfilKesehatan::all();
        // dd($janji_temu);

        $data = [
            'janji_temu' => $janji_temu,
            'profil_kesehatan' => $profil_kesehatan
        ];
        // dd($id_dokter);

        return view('Employee.beranda', $data);
    }

    public function galeri_kesehatan()
    {

        $data = [
            'galeri' => GaleriKesehatan::all(),
        ];

        return view('Mahasiswa.galeri_kesehatan', $data);
    }

    public function obat()
    {

        $data = [
            'obat' => Obat::all(),
        ];

        return view('Mahasiswa.obat', $data);
    }

    public function detail_obat($id)
    {
        $data = [
            'obat' => Obat::find($id),
        ];

        return view('Mahasiswa.detail_obat', $data);
    }

    public function fasilitas_rs()
    {

        $data = [
            'rumah_sakit' => RumahSakit::all(),
        ];

        return view('Mahasiswa.faslititas_rs', $data);
    }

    public function janji_temu(Request $request)
    {

        $data = [
            'id_mahasiswa' => auth()->user()->id,
            'id_dokter' => $request->id_dokter,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
        ];

        JanjiTemu::create($data);

        return redirect()->back()->with('success', 'Sukses membuat janji temu dengan dokter.');

    }

    public function artikel()
    {
        $data = [
            'artikel' => Artikel::all(),
        ];

        return view('Mahasiswa.artikel', $data);
    }

    public function detail_artikel($id)
    {
        $data = [
            'artikel' => Artikel::find($id),
        ];

        return view('Mahasiswa.detail_artikel', $data);
    }


    public function dokter()
    {
        $id_dokter = Employee::find(auth()->user()->id);

        $id_dokter = $id_dokter->id_dokter;
        $janji_temu = JanjiTemu::where('id_dokter', $id_dokter)->get();

        // dd($janji_temu);

        $data = [
            'janji_temu' => $janji_temu
        ];
        return view('Dokter/beranda', $data);
    }

    public function konselor()
    {
        return view('Konselor/homepageKonselor');
    }

    // New method for halamanDokter
    public function halamanDokter()
    {
        return view('halamandokter'); // This returns the 'halamandokter.blade.php' view

    }

    public function update_kesehatan_mhs(Request $request){
         // Validate the incoming request data
         $request->validate([
            'tinggi_badan' => 'required|numeric|between:0,300', // Assuming max height of 300 cm
            'berat_badan' => 'required|numeric|between:0,500', // Assuming max weight of 500 kg
            'golongan_darah' => 'required',
            'riwayat_alergi' => 'required|string',
            'riwayat_penyakit' => 'required|string',
        ]);

        $id = auth()->user()->id;

        // Find the health profile model by ID
        $profil_kesehatan = ProfilKesehatan::where('id_mahasiswa',$id)->first();

        // Update the model's attributes
        $profil_kesehatan->tinggi_badan = $request->tinggi_badan;
        $profil_kesehatan->berat_badan = $request->berat_badan;
        $profil_kesehatan->golongan_darah = $request->golongan_darah;
        $profil_kesehatan->riwayat_alergi = $request->riwayat_alergi;
        $profil_kesehatan->riwayat_penyakit = $request->riwayat_penyakit;

        // Save the model to the database
        $profil_kesehatan->save();

        // Redirect or return response
        return redirect()->back()->with('success', 'Profil kesehatan berhasil diperbarui!');
    }

}
