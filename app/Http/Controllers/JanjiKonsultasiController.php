<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\GaleriKesehatan;
use App\Models\JanjiTemu;
use Illuminate\Http\Request;

class JanjiKonsultasiController extends Controller
{

    public function index()
    {
        $data = [
           'janji_temu' => JanjiTemu::all()
        ];

        return view('Admin.janji_temu.content', $data);


    }
}