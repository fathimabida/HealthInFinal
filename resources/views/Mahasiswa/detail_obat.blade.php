@extends('Mahasiswa.mahasiswa')


@section('content')
    <div class="py-5 container-fluid">

        <a class="btn btn-danger mb-3" href="{{ route('mahasiswa.obat') }}">Kembali</a>
        <div class="row">

            <div class="col-lg-3">
                <div class="card">
                    <img src="{{ asset('storage/' . $obat->foto) }}" class="card-img-top" alt="..." width="100%"
                        height="200">
                    <div class="card-body">
                        <h4 class="card-title">{{ $obat->judul }}</h4>
                        <p class="card-text">
                        <h6>Deskripsi</h6>
                        <p>
                            {{ $obat->deskripsi }}
                        </p>
                        </p>
                        <a href="#" class="btn btn-primary w-100">Beli</a>
                    </div>
                </div>
            </div>
            @php
                function rupiah($angka)
                {
                    $hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
                    return $hasil_rupiah;
                }
            @endphp

            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">

                        <div class="bagian mb-2">
                            <h5 class="card-title">Nomor Registrasi</h5>
                            <p>{{ $obat->nomor_registrasi }}</p>
                        </div>

                        <div class="bagian mb-2">
                            <h5 class="card-title">Harga</h5>
                            <p>{{ rupiah($obat->harga) }}</p>
                        </div>

                        <div class="bagian mb-2">
                            <h5 class="card-title">Dosis</h5>
                            <p>{{ $obat->dosis }}</p>
                        </div>

                        <div class="bagian mb-2">
                            <h5 class="card-title">Aturan Pakai</h5>
                            <p>{{ $obat->aturan_pakai }}</p>
                        </div>

                        <div class="bagian mb-2">
                            <h5 class="card-title">Aturan Pakai</h5>
                            <p>{{ $obat->aturan_pakai }}</p>
                        </div>

                        <div class="bagian mb-2">
                            <h5 class="card-title">Efek Samping</h5>
                            <p>{{ $obat->efek_samping }}</p>
                        </div>

                    </div>
                </div>
            </div>


        </div>



    </div>
@endsection
