@extends('Mahasiswa.mahasiswa')

@section('content')

    <br>
    <br>
    <div class="d-flex flex-column justify-content-center align-items-center">
        <!-- Recent Card -->
        <div class="col-md-8 mb-3 pt-4 mx-auto" style="background-color: #00B9AD; box-shadow: 0 4px 8px rgba(0,0,0,0.2); border-radius: 10px;">
            <div class="card-body">
               <h2 class="card-title text-center mb-4" style="color: #ffffff">{{ $guideline->judul_guideline }}</h2>
            </div>
        </div>
    </div>
    
    <!-- First Card -->
    <div class="d-flex flex-column justify-content-center align-items-center">
        <div class="col-md-8 mb-5" style="background-color: #ffffff; box-shadow: 0 4px 8px rgba(0,0,0,0.2); border-radius: 10px;">
            <div class="card-body pl-4 pr-4">
                <a href="{{ route('dukunganMental') }}" class="btn btn-primary mb-2" style="background-color: #CDDC22; border-color: #CDDC22; font-weight: bold; color: #ffffff;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-backspace-fill" viewBox="0 0 16 16">
                        <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8z"/>
                    </svg> Kembali
                </a>
                <center>
                    <div class="pl-4">
                        <h4 class="card-title mb-2 pt-2">Ciri Awal</h4>
                        <p>{{ $guideline->ciri_awal }}</p>
                    </div>
                    <br>
                    <div class="pl-4">
                        <h4 class="card-title mb-2 pt-2">Pertolongan Pertama yang Bisa Dilakukan :</h4>
                        <p>{{ $guideline->pertolongan_pertama }}</p>
                    </div>
                    <br>
                    <div class="pl-4">
                        <h4 class="card-title mb-2 pt-2">Hindari melakukan hal ini!</h4>
                        <p>{{ $guideline->harus_dihindari }}</p>
                    </div>
                    <br>
                    <div class="pl-4">
                        <h4 class="card-title mb-3 pt-2">Baca lebih lengkap di sini!</h4>
                        <a href="{{ $guideline->url_guideline }}" class="btn btn-primary mb-2" style="background-color: #00B9AD; border-color: #00B9AD; font-weight: bold; color: #ffffff;">Link Guideline</a>
                    </div>
                    <br>
                </center>
            </div>
        </div>
    </div>
    <br>
    <br>
    
@endsection
