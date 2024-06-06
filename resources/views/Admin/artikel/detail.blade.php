@extends('layouts.layout')


@section('addStyle')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
@endsection


@section('content')
    <div class="container mt-5 mb-5">

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif


        <a class="btn btn-danger mb-2" href="{{ route('admin.artikel') }}">
        <span class="fas fa-arrow-left"></span>
            Kembali
        </a>

        <div class="card">

           

            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Detail Artikel</h3>

            </div>
            <div class="card-body">

                <form action="{{ route('admin.tambah-artikel') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $artikel->cover) }}" alt="" id="preview_img"
                            width="100%" height="500">
                    </div>
    
                    
    
    
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Artikel</label>
                        <input type="text" class="form-control" id="judul" name="judul"
                            placeholder="Masukkan judul artikel" required disabled value="{{ $artikel->judul }}">
    
                    </div>
    
    
                    <div class="mb-3">
                        
                        
                        {!! $artikel->isi !!}
    
                    </div>
    
                    
    
                </form>
    

            </div>
        </div>
    </div>
@endsection

@section('addScript')
@endsection
