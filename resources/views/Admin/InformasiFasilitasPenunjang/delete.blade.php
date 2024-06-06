@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hapus Carousel</div>

                <div class="card-body">
                    <p>Apakah Anda yakin ingin menghapus carousel ini?</p>
                    <form action="{{ route('Admin.InformasiFasilitasPenunjang.destroy', $informasi->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                        <a href="{{ route('Admin.InformasiFasilitasPenunjang.index') }}" class="btn btn-secondary">Tidak</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection