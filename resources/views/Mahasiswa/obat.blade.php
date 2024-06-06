@extends('Mahasiswa.mahasiswa')


@section('content')
    <div class="py-5">
        <h2 class="mb-5 text-center">Daftar Obat</h2>

        <div class="row">

            @foreach ($obat as $item)
                <div class="col-lg-3">
                    <div class="container-fluid">
                        <div class="card">
                            <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="..." width="100%"
                                height="200">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->judul }}</h5>
                                <p class="card-text">{{ $item->deskripsi }}</p>
                                <a href="{{ route('mahasiswa.detail_obat', $item->id) }}" class="btn btn-primary">Detail
                                    Obat</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>



    </div>
@endsection
