@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4 text-center my-4">Daftar Kegiatan</h1>
            <div class="text-center mb-4">
                <a href="{{ route('Admin.InformasiKegiatan.create') }}" class="btn btn-primary">Tambah Kegiatan</a>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="row">
                @foreach ($kegiatan as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-img-top">
                                <img src="{{ asset('storage/' . str_replace('public/', '', $item->image)) }}" alt="{{ $item->nama_kegiatan }}" class="img-fluid">
                                <div class="overlay"></div>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $item->nama_kegiatan }}</h5>
                                <p class="card-text">{{ $item->deskripsi }}</p>
                                <p class="card-text"><strong>Tanggal:</strong> {{ $item->tanggal }}</p>
                                <p class="card-text"><strong>Lokasi:</strong> {{ $item->lokasi }}</p>
                                <form action="{{ route('Admin.InformasiKegiatan.delete', $item->id) }}" method="POST" class="mt-auto">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f8f9fa;
    }

    .display-4 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #343a40;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        font-size: 1rem;
        padding: 0.5rem 1rem;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .card {
        border: none;
        border-radius: 0.5rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-img-top img {
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: 500;
        color: #343a40;
    }

    .card-text {
        font-size: 1rem;
        color: #6c757d;
    }

    .alert-success {
        font-size: 1rem;
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }
</style>
@endsection
