@extends('layouts.layout')

@section('content')
<div class="container">
    <h2>Daftar Carousel</h2>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row">
        @foreach($facilities as $facility)
<<<<<<< HEAD
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow">
                <img src="{{ asset('storage/images/' . $facility->image) }}" class="card-img-top rounded" alt="{{ $facility->name }}">
=======
        <div class="col-md-4">
            <div class="card mb-3">
                <img src="{{ asset('storage/images/' . $facility->image) }}" class="card-img-top" alt="{{ $facility->name }}">
>>>>>>> 9ea61cba467d24a9720bc089d806cc0a6a2c065e
                <div class="card-body">
                    <h5 class="card-title">{{ $facility->name }}</h5>
                    <p class="card-text">{{ $facility->description }}</p>
                    <form action="{{ route('Admin.InformasiFasilitasPenunjang.edit', $facility->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                    <form id="deleteForm" action="{{ route('Admin.InformasiFasilitasPenunjang.delete', $facility->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Hapus</button>
</form>                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
