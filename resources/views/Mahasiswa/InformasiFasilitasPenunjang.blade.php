@extends('Mahasiswa.mahasiswa')

@section('content')

<<<<<<< HEAD
<div class="container mt-5">
    <!-- Judul Interaktif -->
    <div class="text-center mb-4">
        <h2 class="fasilitas-judul"><i class="fas fa-building mr-2"></i> Fasilitas Penunjang</h2>
        <div class="underline"></div>
    </div>

    <!-- Carousel -->
    <div id="carouselExampleControls" class="carousel slide mb-5" data-ride="carousel" data-interval="5000">
        <div class="carousel-inner">
            @foreach($facilities as $key => $facility)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" style="height: 400px; width: 100%;">
                <img class="d-block w-100" src="{{ asset('storage/images/' . $facility->image) }}" alt="{{ $facility->name }}">
                <div class="carousel-caption d-none d-md-block text-light">
                    <h5 class="carousel-title">{{ $facility->name }}</h5>
                    <p class="carousel-text">{{ $facility->description }}</p>
=======
<div class="container">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($facilities as $key => $facility)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img class="d-block w-100" src="{{ asset('storage/' . $facility->image) }}" alt="{{ $facility->name }}">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{ $facility->name }}</h5>
                    <p>{{ $facility->description }}</p>
>>>>>>> 9ea61cba467d24a9720bc089d806cc0a6a2c065e
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Cards -->
    <div class="row">
        @foreach($facilities as $key => $facility)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="img-container" style="height: 200px; overflow: hidden;">
                    <img class="card-img-top" src="{{ asset('storage/images/' . $facility->image) }}" alt="{{ $facility->name }}">
                    <div class="card-img-overlay">
                        <h5 class="card-title">{{ $facility->name }}</h5>
                        <p class="card-text">{{ $facility->description }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<<<<<<< HEAD

<style>
    .img-container {
        position: relative;
    }

    .card-img-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        color: #fff;
        padding: 10px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .card:hover .card-img-overlay {
        opacity: 1;
    }

    .card-title {
        font-size: 1rem;
        margin-bottom: 5px;
        font-family: 'Arial', sans-serif; /* Ganti dengan font yang lebih umum */
        font-weight: bold;
    }

    .card-text {
        font-size: 0.875rem;
    }

    /* Efek Judul Interaktif */
    .fasilitas-judul {
        position: relative;
        display: inline-block;
        padding-bottom: 10px;
        font-family: 'Arial', sans-serif; /* Ganti dengan font yang lebih umum */
        font-size: 1.5rem;
        font-weight: bold;
    }

    .fas.fa-tools {
        font-size: 1.5rem;
        color: #007bff; /* Warna ikon */
    }

    .underline {
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        height: 3px;
        width: 80px;
        background-color: #007bff; /* Warna garis bawah */
        border-radius: 5px;
        transition: width 0.3s ease;
    }

    .fasilitas-judul:hover .underline {
        width: 120px; /* Panjang garis bawah saat dihover */
    }

    /* Carousel Caption Styles */
    .carousel-caption {
        background: none; /* Menghapus latar belakang */
        color: #fff; /* Warna teks putih */
        padding: 20px;
    }

    .carousel-title {
        font-size: 1.5rem;
        font-family: 'Arial', sans-serif; /* Ganti dengan font yang lebih umum */
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .carousel-text {
        font-size: 1rem;
        font-family: 'Arial', sans-serif; /* Ganti dengan font yang lebih umum */
    }

    .carousel-item img {
    height: 400px; /* Sesuaikan dengan tinggi yang diinginkan */
    width: auto; /* Biarkan lebar menyesuaikan agar tidak terdistorsi */
    }

</style>

@endsection
=======
@endsection
>>>>>>> 9ea61cba467d24a9720bc089d806cc0a6a2c065e
