<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DukunganKesehatanMental;

class DukunganKesehatanMentalController extends Controller
{
    //tampilan index mahasiswa
    public function indexDukunganMental() {

        $guidelines = DukunganKesehatanMental::all();

        return view('mahasiswa/DukunganKesehatanMental/dukungankesehatanmental', compact('guidelines'));
    }

    public function indexdetail($id) {

        $guideline = DukunganKesehatanMental::find($id);

        return view('mahasiswa/DukunganKesehatanMental/detailGuideline', compact('guideline'));
    }

    public function formDukungan() {

        return view('admin/DukunganKesehatanMental/formDukunganMental');
    }

    public function store(Request $request){
        
        $data = $request->validate([
                'section' => ['required' , 'String'],
                'judul_guideline' => ['required' , 'String'],
                'ciri_awal' => ['required' , 'String'],
                'pertolongan_pertama' => ['required' , 'String'],
                'harus_dihindari' => ['required', 'String'],
                'url_guideline' => ['required' , 'String'],

            ]); 

            DukunganKesehatanMental::create([

                'section' => $data['section'], 
                'judul_guideline' => $data['judul_guideline'],
                'ciri_awal' => $data['ciri_awal'],
                'pertolongan_pertama' => $data['pertolongan_pertama'],
                'harus_dihindari' => $data['harus_dihindari'],
                'url_guideline' => $data['url_guideline'],

        ]);

        return redirect(route('listGuideline'));
    }

    //show List Guideline
    public function listGuideline(){

        $guideline = DukunganKesehatanMental::all();

        return view('/admin/DukunganKesehatanMental/listDukungan', compact('guideline'));
    
    }

     // show update page
     public function update(Request $request, $id)
     {
         $guideline = DukunganKesehatanMental::findOrFail($id);
         return view('/admin/DukunganKesehatanMental/update', compact('guideline'));
     }
 
     // Assign Value After Changes
     public function replace(Request $request, $id) {
 
         $guideline = DukunganKesehatanMental::findOrFail($id);
 
         $guideline->section = $request->section;
         $guideline->judul_guideline = $request->judul_guideline;
         $guideline->ciri_awal = $request->ciri_awal;
         $guideline->pertolongan_pertama = $request->pertolongan_pertama;
         $guideline->harus_dihindari = $request->harus_dihindari;
         $guideline->url_guideline = $request->url_guideline;
 
         $guideline->save();
 
         return redirect(route('listGuideline'));
 
     }

      // Delete
    public function destroy($id) {
        $guideline = DukunganKesehatanMental::findOrFail($id);
        $guideline->delete();
  
        return redirect(route('listGuideline'));
  
  
      }

}
