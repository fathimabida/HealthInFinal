@extends('layouts.layout')

@section('addStyle')
    <style>
        /* Animasi */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animated {
            animation-name: fadeIn;
            animation-duration: 0.5s;
            animation-fill-mode: both;
        }

        /* Efek Hover Tombol */
        .btn-primary {
            background-color: #6C63FF;
            border-color: #6C63FF;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-primary:hover {
            background-color: #4C46D3;
            transform: scale(1.1);
        }

        /* Efek Hover pada Kartu */
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.3);
        }

        /* Visual yang Menarik */
        .icon {
            font-size: 1.5rem;
            margin-right: 5px;
        }

        /* Penyesuaian Carousel */
        .carousel-item img {
            height: 60vh; /* Menyesuaikan tinggi gambar */
            object-fit: cover; /* Mengatur agar gambar tetap proporsional */
        }
    </style>
@endsection

@section('content')
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://via.placeholder.com/1200x400" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="https://via.placeholder.com/1200x400" class="d-block w-100" alt="Slide 2">
            </div>
        </div>
    </div>

    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Profil Pengguna -->
            <div class="col-md-2">
                <div class="card text-center">
                    <div class="card-header card-header-icon">
                        <i class="bi bi-person-circle icon"></i>
                        <h6>Profil Pengguna</h6>
                    </div>
                    <div class="card-body">
                        <img src="https://via.placeholder.com/100" class="rounded-circle mb-3" alt="Profil Pengguna">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="#" class="nav-link">
                                    <i class="bi bi-house icon"></i>Home
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="nav-link">
                                    <i class="bi bi-calendar-check icon"></i>List Janji Temu
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="nav-link">
                                    <i class="bi bi-file-earmark-text icon"></i>List Hasil MCU
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="nav-link">
                                    <i class="bi bi-box-arrow-right icon"></i>Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Cardboard -->
            <div class="col-md-8">
                <div class="card animated">
                    <h5 class="card-header text-center">List Konsultasi dan Janji</h5>
                    <div class="card-body">
                        <h5 class="card-title">Daftar janji dan konsultasi yang berlangsung</h5>
                        <ul class="list-group" id="list-janji">
                            <li class="list-group-item">Janji 1</li>
                            <li class="list-group-item">Janji 2</li>
                            <li class="list-group-item">Janji 3</li>
                            <!-- List janji akan diisi oleh data yang diperoleh secara dinamis -->
                        </ul>
                        <a href="#" class="btn btn-primary mt-3">Buat Janji Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="https://via.placeholder.com/400x200" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title 1</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="https://via.placeholder.com/400x200" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title 2</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="https://via.placeholder.com/400x200" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title 3</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
