@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Delete Kegiatan</h1>
            <p>Apakah Anda yakin ingin menghapus kegiatan ini?</p>
            <form action="{{ route('informasi_kegiatan.destroy', $informasi_kegiatan->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>
</div>
@endsection
