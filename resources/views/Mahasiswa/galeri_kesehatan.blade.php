@extends('Mahasiswa.mahasiswa')


@section('content')
    <div class="py-5">
        <h2 class="mb-5 text-center">Galeri Fasilitas Kesehatan</h2>

        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">

                @php
                    $no = 0;
                @endphp
                @foreach ($galeri as $item)
                    <li data-target="#carouselExampleCaptions" data-slide-to="{{ $no++ }}"
                        class="{{ $item->id == 1 ? 'active' : '' }}"></li>
                @endforeach

            </ol>
            <div class="carousel-inner">

                @foreach ($galeri as $item)
                    <div class="carousel-item {{ $item->id == 1 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $item->foto) }}" class="d-block w-100" alt="..."
                            style="height: 600px">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $item->nama_fasilitas }}</h5>
                            <p>{{ $item->deskripsi }}</p>
                        </div>
                    </div>
                @endforeach



            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
@endsection
