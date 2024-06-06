<?php

namespace App\Http\Controllers;

use App\Models\SuratRujukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratRujukanController extends Controller
{
    public function formSurat() {
        return view('employee/suratrujukan/suratrujukan');
    }

    public function store(Request $request){
        
        $data = $request->validate([
                'dokter_rujukan' => ['required' , 'String'],
                'rs_rujukan' => ['required' , 'String'],
                'dokter_perujuk' => ['required' , 'String'],
                'tgl_rujuk' => ['required' , 'date'],
                'nim_pasien' => ['required', 'String'],
                'nama_pasien' => ['required' , 'String'],
                'diagnosa' => ['required' , 'String'],
                'masa_berlaku' => ['required' , 'date'],
                'file_surat' => ['required' , 'file'],

            ]); 
   
            // Store the uploaded file and get its path
            $filePath = $request->file('file_surat')->store('surat_rujukan_files');

        SuratRujukan::create([

                'dokter_rujukan' => $data['dokter_rujukan'], 
                'rs_rujukan' => $data['rs_rujukan'],
                'dokter_perujuk' => $data['dokter_perujuk'],
                'tgl_rujuk' => $data['tgl_rujuk'],
                'nim_pasien' => $data['nim_pasien'],
                'nama_pasien' => $data['nama_pasien'],
                'diagnosa' => $data['diagnosa'],
                'masa_berlaku' => $data['masa_berlaku'],
                'file_surat' => $filePath,

        ]);

        return redirect(route('listSuratRujukan'));
    }

     // show list surat rujukan page employee
     public function showListSurat()
     {
        $suratrujukans = SuratRujukan::all();
         return view('/employee/suratrujukan/listSuratRujukan', compact('suratrujukans'));
     }

     // Download file
    public function downloadFile($id) {
        $suratrujukan = SuratRujukan::findOrFail($id);
        return Storage::download($suratrujukan->file_surat);
    }

     // Delete
    public function destroy($id) {
        $suratrujukans = SuratRujukan::findOrFail($id);
        $suratrujukans->delete();
  
        return redirect(route('listSuratRujukan'));
  
  
      }

}
