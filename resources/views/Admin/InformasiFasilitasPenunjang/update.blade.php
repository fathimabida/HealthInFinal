@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Carousel</div>

                <div class="card-body">
                    <form action="{{ route('Admin.InformasiFasilitasPenunjang.update', $informasi->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nama:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $informasi->name }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi:</label>
                            <textarea name="description" id="description" class="form-control" rows="3">{{ $informasi->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar:</label>
                            <input type="file" name="image" id="image" class="form-control-file">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection