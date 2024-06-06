@extends('layouts.layout')





@section('content')
    <div class="container mt-5 mb-5">

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <a class="btn btn-danger mb-2" href="{{ route('admin.informasi_fasliltas_kesehatan') }}">
            <span class="fas fa-arrow-left"></span> Kembali
        </a>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Ubah Data Rumah Sakit</h3>

            </div>
            <div class="card-body">

                <form action="{{ route('admin.update_rs', $rs->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Rumah Sakit</label>
                        <input type="text" class="form-control @error('rumah_sakit') is-invalid @enderror"
                            id="rumah_sakit" name="rumah_sakit" placeholder="Rumah Sakit" value="{{ $rs->rumah_sakit }}"
                            required>

                        @error('rumah_sakit')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat Rumah Sakit</label>
                        <textarea name="alamat" id="" cols="30" rows="10"
                            class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat Rumah Sakit" required>{{ $rs->alamat }}</textarea>

                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No Hp</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                            name="phone" placeholder="No Hp" value="{{ $rs->phone }}" required>

                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Link Maps</label>
                        <input type="text" class="form-control @error('link_maps') is-invalid @enderror" id="link_maps"
                            name="link_maps" placeholder="Link Maps" value="{{ $rs->link_maps }}" required>

                        @error('link_maps')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto"
                            name="foto" placeholder="Foto Rumah Sakit" value="{{ $rs->foto }}" accept="image/*">

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
