@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="title-heading"><i class="fas fa-book mr-2"></i>Daftar Kegiatan Mahasiswa</h1>
            <div class="separator">
                <i class="fas fa-chevron-down fa-3x text-primary icon-spin"></i>
            </div>
        </div>
    </div>
</div>
<div class="container mt-4">
    <div class="row">
        @foreach ($kegiatan as $item)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-img-top overflow-hidden" style="height: 200px;">
                        <img src="{{ asset('storage/' . str_replace('public/', '', $item->image)) }}" class="img-fluid w-100 h-100 object-cover rounded-top" alt="{{ $item->nama_kegiatan }}">
                    </div>
                    <div class="card-body bg-white">
                        <h5 class="card-title text-primary text-center">{{ $item->nama_kegiatan }}</h5>
                        <p class="card-text text-muted text-center">{{ Str::limit($item->deskripsi, 150) }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0 d-flex justify-content-between align-items-center">
                        <div class="text-muted">
                            <p class="mb-0"><i class="fas fa-calendar-alt mr-2"></i>{{ $item->tanggal }}</p>
                            <p class="mb-0"><i class="fas fa-map-marker-alt mr-2"></i>{{ $item->lokasi }}</p>
                        </div>
                        <a href="#" class="btn btn-primary btn-sm">Selengkapnya <i class="fas fa-chevron-right ml-1"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Montserrat', sans-serif;
    }

    .title-heading {
        font-family: 'Great Vibes', cursive;
        font-size: 3rem;
        margin-bottom: 30px;
    }

    .separator {
        margin-bottom: 30px;
    }

    .card {
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
        position: relative;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    }

    .card-img-top {
        border-radius: 15px 15px 0 0;
        overflow: hidden;
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .card-text {
        font-size: 0.9rem;
        margin-bottom: 10px;
    }

    .btn-primary {
        background-color: #60c0d0;
        border-color: #60c0d0;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #488f9f;
        border-color: #488f9f;
    }

    .card-footer {
        border-top: 1px solid rgba(0, 0, 0, 0.125);
        transition: background-color 0.3s;
    }

    .card-footer:hover {
        background-color: rgba(0, 0, 0, 0.05);
    }

    /* Animasi untuk ikon */
    @keyframes heartbeat {
        0% {
            transform: scale(0.75);
            opacity: 0.75;
        }
        20% {
            transform: scale(1);
            opacity: 1;
        }
        40% {
            transform: scale(0.75);
            opacity: 0.75;
        }
        60% {
            transform: scale(1);
            opacity: 1;
        }
        80% {
            transform: scale(0.75);
            opacity: 0.75;
        }
        100% {
            transform: scale(0.75);
            opacity: 0.75;
        }
    }

    /* Menerapkan animasi ke ikon */
    .icon-spin {
        animation: heartbeat 1.5s infinite;
    }
</style>
@endpush

@push('scripts')
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endpush
