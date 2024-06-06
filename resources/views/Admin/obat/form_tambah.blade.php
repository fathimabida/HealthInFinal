@extends('layouts.layout')





@section('content')
    <div class="container mt-5 mb-5">

        <a class="btn btn-danger mb-2" href="{{ route('admin.obat') }}">
            <span class="fas fa-arrow-left"></span> Kembali
        </a>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Isi Data Rekomendasi Obat</h3>

            </div>
            <div class="card-body">

                <form action="{{ route('admin.tambah_obat') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Judul Obat</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror"
                            id="judul" name="judul" placeholder="Judul Obat"
                            value="{{ old('judul') }}" required>

                        @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nomor Registrasi</label>
                        <input type="number" class="form-control @error('nomor_registrasi') is-invalid @enderror"
                            id="nomor_registrasi" name="nomor_registrasi" placeholder="Nomor Registrasi"
                            value="{{ old('nomor_registrasi') }}" required>

                        @error('nomor_registrasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror"
                            id="harga" name="harga" placeholder="Harga"
                            value="{{ old('harga') }}" required>

                        @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="" cols="30" rows="10"
                            class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Deskripsi" required>{{ old('deskripsi') }}</textarea>

                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Dosis</label>
                        <textarea name="dosis" id="" cols="30" rows="10"
                            class="form-control @error('dosis') is-invalid @enderror" placeholder="Dosis" required>{{ old('dosis') }}</textarea>

                        @error('dosis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Aturan Pakai</label>
                        <textarea name="aturan_pakai" id="" cols="30" rows="10"
                            class="form-control @error('aturan_pakai') is-invalid @enderror" placeholder="Aturan Pakai" required>{{ old('aturan_pakai') }}</textarea>

                        @error('aturan_pakai')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Efek Samping</label>
                        <textarea name="efek_samping" id="" cols="30" rows="10"
                            class="form-control @error('efek_samping') is-invalid @enderror" placeholder="Efek Samping" required>{{ old('efek_samping') }}</textarea>

                        @error('efek_samping')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto"
                            name="foto" placeholder="Nama Fasilitas Kesehatan" value="{{ old('foto') }}" required
                            accept="image/*">

                        @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="btn btn-primary w-100">Submit</button>

                </form>


            </div>
        </div>
    </div>
@endsection
