@extends('Mahasiswa.mahasiswa')


@section('content')
    <div class="container-fluid py-5">
        <h2 class="mb-5 text-center">Fasilitas Rumah Sakit</h2>

        <div class="row">
            @foreach ($rumah_sakit as $item)
                <div class="col-lg-3">
                    <div class="card">
                        <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="..."
                            style="width: 100%;height: 250px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->rumah_sakit }}</h5>
                            <p class="card-text">
                                {{ $item->alamat }}
                            </p>
                            <a href="{{ $item->link_maps }}" class="btn btn-primary">Lihat Maps</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>




    </div>
@endsection
