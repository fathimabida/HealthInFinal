@extends('layouts.layout')





@section('content')
    <div class="container mt-5 mb-5">

        <a class="btn btn-danger mb-2" href="{{ route('admin.galeri_kesehatan') }}">
            <span class="fas fa-arrow-left"></span> Kembali
        </a>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Data Galeri Kesehatan</h3>

            </div>
            <div class="card-body">

                <form action="{{ route('admin.tambah_galeri_kesehatan') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nama Fasilitas Kesehatan</label>
                        <input type="text" class="form-control @error('nama_fasilitas') is-invalid @enderror"
                            id="nama_fasilitas" name="nama_fasilitas" placeholder="Nama Fasilitas Kesehatan"
                            value="{{ old('nama_fasilitas') }}" required>

                        @error('nama_fasilitas')
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
