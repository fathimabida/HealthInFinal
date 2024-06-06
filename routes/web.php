<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\GaleriKesehatanController;
use App\Http\Controllers\HelpdeskController;
use App\Http\Controllers\InformasiFasilitasKesehatan;
use App\Http\Controllers\InformasiFasilitasPenunjangController;
use App\Http\Controllers\JanjiKonsultasiController;
use App\Http\Controllers\KonselingController;
use App\Http\Controllers\ListDokterController;
use App\Http\Controllers\ListKonselorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SuratRujukanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DukunganKesehatanMentalController;
use App\Http\Controllers\BmiController;
use App\Http\Controllers\InformasiKegiatanController;
use App\Http\Controllers\HasilMcuController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'loginPage'])->name('loginPage');
Route::post('/', [LoginController::class, 'login'])->name('login');

// Route Register
Route::get('/register', [RegisterController::class, 'register'])->name('registerPage');
Route::post('registration', [RegisterController::class, 'proses_register'])->name('registration');

//route admin
Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/admin', [UserController::class, 'admin'])->name('homepageAdmin'); // ini nanti route ke Homepage Admin

    //route admin-list dokter
    Route::get('/listDokterA', [ListDokterController::class, 'viewlistdoctor'])->name('admin.ListDokter.listDokterA'); // route ke list dokter admin
    Route::get('/admin/createListDokter', [ListDokterController::class, 'createListDoctor'])->name('admin.create.listDokter'); //nambah list dokter
    Route::post('/admin/dokter/store', [ListDokterController::class, 'store_doctor'])->name('admin.store.listDokter');
    Route::delete('/admin/dokter/{id}/delete', [ListDokterController::class, 'deleteDoctor'])->name('admin.delete.listDokter');
    Route::get('/admin/dokter/{id}/edit', [ListDokterController::class, 'editDoctor'])->name('admin.edit.listDokter');
    Route::put('/admin/dokter/{id}/update', [ListDokterController::class, 'updateDoctor'])->name('admin.update.listDokter');

    //route admin-list konselor
    Route::get('/listKonselorA', [ListKonselorController::class, 'viewlistCounselor'])->name('admin.ListKonselor.listKonselorA'); // route ke list dokter admin
    Route::get('/admin/createListKonselor', [ListKonselorController::class, 'createListCounselor'])->name('admin.create.listKonselor'); //nambah list Konselor
    Route::post('/admin/konselor/store', [ListKonselorController::class, 'store_Counselor'])->name('admin.store.listKonselor');
    Route::delete('/admin/konselor/{id}/delete', [ListKonselorController::class, 'deleteCounselor'])->name('admin.delete.listKonselor');
    Route::get('/admin/konselor/{id}/edit', [ListKonselorController::class, 'editCounselor'])->name('admin.edit.listKonselor');
    Route::put('/admin/konselor/{id}/update', [ListKonselorController::class, 'updateCounselor'])->name('admin.update.listKonselor');

    //route admin-galeri kesehatan
    Route::get('galeri_kesehatan', [GaleriKesehatanController::class, 'index'])->name('admin.galeri_kesehatan');
    Route::get('form_tambah', [GaleriKesehatanController::class, 'create'])->name('admin.tambah_galeri_kesehatan');
    Route::get('galeri_kesehatan/delete/{id}', [GaleriKesehatanController::class, 'destroy'])->name('admin.hapus_galeri_kesehatan');

    Route::get('galeri_kesehatan/edit/{id}', [GaleriKesehatanController::class, 'edit'])->name('admin.edit_galeri_kesehatan');
    Route::post('update_galeri_kesehatan/{id}', [GaleriKesehatanController::class, 'update'])->name('admin.update_galeri_kesehatan');

    Route::prefix('obat')->group(function () {
        Route::get('/', [ObatController::class, 'index'])->name('admin.obat');
        Route::get('tambah_obat', [ObatController::class, 'create'])->name('admin.tambah_obat');

        Route::post('tambah_obat', [ObatController::class, 'store'])->name('admin.tambah_obat');

        Route::get('edit_obat/{id}', [ObatController::class, 'edit'])->name('admin.edit_obat');
        Route::post('update_obat/{id}', [ObatController::class, 'update'])->name('admin.update_obat');

        Route::get('hapus_obat/{id}', [ObatController::class, 'destroy'])->name('admin.hapus_obat');
    });

    Route::prefix('janji_temu')->group(function () {
        Route::get('/', [JanjiKonsultasiController::class, 'index'])->name('admin.janji_temu');

    });

    Route::prefix('artikel')->group(function () {
        Route::get('/', [ArtikelController::class, 'index'])->name('admin.artikel');
        Route::get('tambah', [ArtikelController::class, 'create'])->name('admin.tambah-artikel');
        Route::post('tambah', [ArtikelController::class, 'store'])->name('admin.tambah-artikel');
        Route::get('hapus/{id}', [ArtikelController::class, 'delete'])->name('admin.hapus-artikel');

        Route::get('detail/{id}', [ArtikelController::class, 'show'])->name('admin.detail-artikel');

    });

    Route::prefix('informasi_fasilitas_kesehatan')->group(function () {

        Route::get('/', [InformasiFasilitasKesehatan::class, 'index'])->name('admin.informasi_fasliltas_kesehatan');

        Route::get('tambah_rs', [InformasiFasilitasKesehatan::class, 'create'])->name('admin.tambah_rs');
        Route::post('tambah_rs', [InformasiFasilitasKesehatan::class, 'store'])->name('admin.tambah_rs');

        Route::get('edit_rs/{id}', [InformasiFasilitasKesehatan::class, 'edit'])->name('admin.edit_rs');
        Route::post('edit_rs/{id}', [InformasiFasilitasKesehatan::class, 'update'])->name('admin.update_rs');
        Route::get('hapus_rs/{id}', [InformasiFasilitasKesehatan::class, 'destroy'])->name('admin.hapus_rs');

        // Route::post('/', [TahunPenilaiianController::class, 'store'])->name('data-penilaiian.store');
    });
    //route informasi fasilitas penunjang
    // Untuk menampilkan halaman daftar informasi fasilitas penunjang
    Route::get('/admin/informasifasilitaspenunjang', [InformasiFasilitasPenunjangController::class, 'index'])
        ->name('Admin.InformasiFasilitasPenunjang.index');

    // Untuk menampilkan halaman form tambah informasi fasilitas penunjang
    Route::get('/admin/informasifasilitaspenunjang/create', [InformasiFasilitasPenunjangController::class, 'create'])
        ->name('Admin.InformasiFasilitasPenunjang.create');

    // Untuk menyimpan data informasi fasilitas penunjang baru
    Route::post('/admin/informasifasilitaspenunjang/store', [InformasiFasilitasPenunjangController::class, 'store'])
        ->name('Admin.InformasiFasilitasPenunjang.store');

    // Untuk menampilkan halaman form edit informasi fasilitas penunjang
    Route::get('/admin/informasifasilitaspenunjang/{informasi}/edit', [InformasiFasilitasPenunjangController::class, 'edit'])
        ->name('Admin.InformasiFasilitasPenunjang.edit');

    // Untuk menyimpan perubahan data informasi fasilitas penunjang yang sudah ada
    Route::put('/admin/informasifasilitaspenunjang/{informasi}', [InformasiFasilitasPenunjangController::class, 'update'])
        ->name('Admin.InformasiFasilitasPenunjang.update');

    // Untuk menghapus data informasi fasilitas penunjang
    Route::delete('/admin/informasifasilitaspenunjang/{informasi}/delete', [InformasiFasilitasPenunjangController::class, 'destroy'])
        ->name('Admin.InformasiFasilitasPenunjang.delete');

    // // Route untuk dashboard admin
    // Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    // Route Helpdesk Admin
    Route::get('/helpdesk-admin', [HelpdeskController::class, 'helpdeskAdmin'])->name('helpdeskAdmin');
    Route::get('/admin/helpdesk/{id}/edit', [HelpdeskController::class, 'update'])->name('helpdeskUpdate');
    Route::post('/admin/helpdesk/{id}/replace', [HelpdeskController::class, 'replace'])->name('helpdeskReplace');

    // Route Informasi Kegiatan
    Route::get('/admin/informasikegiatan', [InformasiKegiatanController::class, 'index'])->name('Admin.InformasiKegiatan.index');
    Route::get('/admin/informasikegiatan/create', [InformasiKegiatanController::class, 'create'])->name('Admin.InformasiKegiatan.create');
    Route::post('/admin/informasikegiatan/store', [InformasiKegiatanController::class, 'store'])->name('Admin.InformasiKegiatan.store');
    Route::delete('/admin/informasikegiatan/{informasi_kegiatan}/delete', [InformasiKegiatanController::class, 'destroy'])->name('Admin.InformasiKegiatan.delete');
  
    //Dukungan Kesehatan Mental Admin
    Route::get('/admin/form-dukungan-kesehatan-mental', [DukunganKesehatanMentalController::class, 'formDukungan'])->name('formDukunganMental');
    Route::post('/admin/store-guideline/store', [DukunganKesehatanMentalController::class, 'store'])->name('storeGuideline');
    Route::get('/admin/list-guideline', [DukunganKesehatanMentalController::class, 'listGuideline'])->name('listGuideline');
    Route::get('/admin/guideline/{id}/edit', [DukunganKesehatanMentalController::class, 'update'])->name('updateGuideline');
    Route::post('/admin/guideline/{id}/replace', [DukunganKesehatanMentalController::class, 'replace'])->name('replaceGuideline');
    Route::delete('/admin/guideline/{id}', [DukunganKesehatanMentalController::class, 'destroy'])->name('deleteGuideline');

});

// route Perawat
Route::group(['middleware' => ['auth:employee']], function () {
    Route::get('/employee', [UserController::class, 'employee'])->name('homepageEmployee'); // ini nanti route ke Homepage Employee (Konselor, Perawat, Dokter)

    //Surat Rujukan
    Route::get('/surat-rujukan', [SuratRujukanController::class, 'formSurat'])->name('formSuratRujukan');
    Route::post('/surat-rujukan/store', [SuratRujukanController::class, 'store'])->name('storeSuratRujukan');
    Route::get('/list-suratrujukan', [SuratRujukanController::class, 'showListSurat'])->name('listSuratRujukan');
    Route::get('/suratrujukan/download/{id}', [SuratRujukanController::class, 'downloadFile'])->name('downloadSuratRujukan');
    Route::delete('/surat-rujukan/{id}', [SuratRujukanController::class, 'destroy'])->name('suratRujukanDelete');

    
    //New route for 'halamandokter'
    Route::get('/halamandokter', [UserController::class, 'halamanDokter'])->name('halamandokter');
});

// route Dokter
Route::group(['middleware' => ['auth:dokter']], function () {
    Route::get('/dokter', [UserController::class, 'dokter']);

});

// route Konselor
Route::group(['middleware' => ['auth:konselor']], function () {
    Route::get('/konselor', [UserController::class, 'konselor']);

    //Hasil Konseling-konselor
    Route::get('/konselor/hasilKonseling', [KonselingController::class, 'showCounseling'])->name('konselor.hasilKonseling');
    Route::get('/konselor/detailHasilKonseling/{id}', [KonselingController::class, 'detailHasilKonseling'])->name('konselor.detail.hasilKonseling');
    Route::put('/konselor/detailHasilKonseling/{id}/process', [KonselingController::class, 'updateCounseling'])->name('konselor.update.hasilKonseling');
    Route::get('/createHasilKonseling', [KonselingController::class, 'createHasilKonseling'])->name('createHasilKonseling');
    Route::post('/konselor/konseling/store', [KonselingController::class, 'store_counseling'])->name('konselor.store.hasilkonseling');

});

// route Mahasiswa
Route::group(['middleware' => ['auth:mahasiswa']], function () {
    // ini nanti route ke Homepage Mahasiswa

    Route::prefix('mahasiswa')->group(function () {

        Route::get('/', [UserController::class, 'mahasiswa'])->name('homepageMahasiswa');

        Route::get('galeri_kesehatan', [UserController::class, 'galeri_kesehatan'])->name('mahasiswa.galeri_kesehatan');


        Route::post('update', [UserController::class, 'updateProfileMhs'])->name('mahasiswa.update');



        Route::get('obat', [UserController::class, 'obat'])->name('mahasiswa.obat');
        Route::get('obat/{id}', [UserController::class, 'detail_obat'])->name('mahasiswa.detail_obat');

        Route::get('fasilitas_rs', [UserController::class, 'fasilitas_rs'])->name('mahasiswa.fasilitas_rs');

        Route::post('janji_temu', [UserController::class, 'janji_temu'])->name('mahasiswa.janji_temu');

        Route::get('artikel', [UserController::class, 'artikel'])->name('mahasiswa.artikel');
        Route::get('detail_artikel/{id}', [UserController::class, 'detail_artikel'])->name('mahasiswa.detail_artikel');


        Route::post('update_kesehatan', [UserController::class, 'update_kesehatan_mhs'])->name('mahasiswa.update_kesehatan');


        Route::get('/mahasiswa/informasifasilitaspenunjang', [InformasiFasilitasPenunjangController::class, 'indexmhs'])->name('Mahasiswa.InformasiFasilitasPenunjang');
        Route::get('/mahasiswa/hasil-mcu', [HasilMcuController::class, 'indexmhs'])->name('Mahasiswa.hasil_mcu');
        Route::get('/mahasiswa/informasikegiatan', [InformasiKegiatanController::class, 'mahasiswaIndex'])->name('Mahasiswa.InformasiKegiatan');

    });
    //List
    Route::get('/listdokter', [ListDokterController::class, 'doctors'])->name('mahasiswa.listDokter'); //route ke list dokter mahasiswa

    Route::get('/listKonselor', [ListKonselorController::class, 'counselors'])->name('mahasiswa.listKonselor');
     
     Route::get('bmi', [BmiController::class, 'index'])->name('mahasiswa.bmi');
      Route::post('bmi', [BmiController::class, 'store'])->name('mahasiswa.bmi');

    //Hasil Konseling-mahasiswa
    Route::get('/hasilKonseling', [KonselingController::class, 'konseling'])->name('mahasiswa.konseling');
    Route::get('/detailHasilKonseling/{id}', [KonselingController::class, 'showDetails'])->name('mahasiswa.detail.konseling');

    //helpdesk
    Route::get('/helpdesk', [HelpdeskController::class, 'helpdeskPage'])->name('helpdesk'); //route ke helpdesk

    //informasi
    Route::get('/informasifasilitaspenunjang', [InformasiFasilitasPenunjangController::class, 'indexmhs'])->name('Mahasiswa.InformasiFasilitasPenunjang');

    // Dukungan Kesehatan Mental
    Route::get('/mahasiswa/dukungan-mental', [DukunganKesehatanMentalController::class, 'indexDukunganMental'])->name('dukunganMental');
    Route::get('/mahasiswa/dukungan-mental/details/{id}', [DukunganKesehatanMentalController::class, 'indexdetail'])->name('detailGuideline');
});


//logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
