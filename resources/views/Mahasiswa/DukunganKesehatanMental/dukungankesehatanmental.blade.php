@extends('Mahasiswa.mahasiswa')

@section('content')

    <br>
    <br>
    <div class="d-flex flex-column justify-content-center align-items-center">
        <!-- Recent Card -->
        <div class="col-md-12 mb-3 pt-4" style="background-color: #00B9AD; box-shadow: 0 4px 8px rgba(0,0,0,0.2); border-radius: 10px;">
            <div class="card-body">
               <h2 class="card-title text-center mb-4" style="color: #ffffff">Dukungan Kesehatan Mental</h2>
            </div>
            
        </div>
    </div>
    <!-- First Card -->
    <center>
    @foreach($guidelines as $guideline)
    <div class="col-12 mb-5" style="background-color: #ffffff; box-shadow: 0 4px 8px rgba(0,0,0,0.2); border-radius: 10px;">
        <div class="card-body">
           <h4 class="card-title text-center pt-3">{{ $guideline->section }}</h4>
           <br>
           
               <!-- Group of Cards Below -->
               <div class="row justify-content-center">
                   <!-- First Card in Group -->
                   <div class="col-md-5 mb-4">
                       <a href="{{ route('detailGuideline', $guideline->id) }}" class="card" style="background-color: #ffffff; border-color: #00B9AD; box-shadow: 0 4px 8px rgba(0,0,0,0.2); border-radius: 10px;">
                           <div class="d-flex justify-content-center align-items-center pt-3" style="height: 100%;">
                           </div>
                           <div class="card-body">
                              <h6 class="card-title-bottom text-center" style="color: #000000; text-decoration: underline; text-decoration-color: #000000;">{{ $guideline->judul_guideline }}</h6>
                           </div>
                       </a>
                   </div>
               </div>
               <br>
               <br>
            </div>
        </div>
        @endforeach
        <center>
        <a href="{{ route('homepageMahasiswa') }}" class="btn btn-primary"  style="background-color: #00B9AD; border-color: #00B9AD; font-weight: bold; color: #ffffff;">Kembali ke Beranda</a>
    </div>
    <br>
    <br>
    
@endsection
