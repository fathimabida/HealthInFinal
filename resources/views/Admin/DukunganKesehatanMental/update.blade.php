@extends('layouts.layout')

@section('content')
<br>
<div class="container mt-5">
    <br>
    <h2 class="text-center">Form Dukungan Kesehatan Mental</h2>

    <!-- Form Pemesanan -->
    <form method="POST" action="{{ route('replaceGuideline', ['id' => $guideline->id]) }}" enctype="multipart/form-data">
        @csrf 
        <br>
        <br>
        <div class="mb-3">
            <label for="section" class="form-label">Mental Health Section</label>
            <select class="form-control" id="section" name="section" required onchange="toggleCustomOption(this)">
                <option value="">Choose One...</option>
                <option value="Depression" {{ $guideline->section == 'Depression' ? 'selected' : '' }}>Depression</option>
                <option value="Eating disorders" {{ $guideline->section == 'Eating disorders' ? 'selected' : '' }}>Eating disorders</option>
                <option value="Psychosis" {{ $guideline->section == 'Psychosis' ? 'selected' : '' }}>Psychosis</option>
                <option value="Non-suicidal self-injury" {{ $guideline->section == 'Non-suicidal self-injury' ? 'selected' : '' }}>Non-suicidal self-injury</option>
                <option value="Panic attacks" {{ $guideline->section == 'Panic attacks' ? 'selected' : '' }}>Panic attacks</option>
                <option value="Suicidal thoughts and behaviours" {{ $guideline->section == 'Suicidal thoughts and behaviours' ? 'selected' : '' }}>Suicidal thoughts and behaviours</option>
                <option value="other" {{ $guideline->section == 'other' ? 'selected' : '' }}>Other...</option>
            </select>
        </div>
        <div class="mb-3" id="customOptionDiv" style="display: {{ $guideline->section == 'other' ? 'block' : 'none' }};">
            <label for="custom_option" class="form-label">Tuliskan Section</label>
            <input type="text" class="form-control" id="custom_option" name="custom_option" value="{{ $guideline->custom_option }}">
        </div>
        
        <script>
            function toggleCustomOption(selectElement) {
                const customOptionDiv = document.getElementById('customOptionDiv');
                if (selectElement.value === 'other') {
                    customOptionDiv.style.display = 'block';
                    document.getElementById('custom_option').required = true;
                } else {
                    customOptionDiv.style.display = 'none';
                    document.getElementById('custom_option').required = false;
                }
            }
        </script>
        
        <div class="mb-3">
            <label for="judul_guideline" class="form-label">Judul Guideline</label>
            <input type="text" class="form-control" id="judul_guideline" name="judul_guideline" value="{{ $guideline->judul_guideline }}" required>
        </div>

        <div class="mb-3">
            <label for="ciri_awal" class="form-label">Ciri Awal</label>
            <textarea class="form-control" id="ciri_awal" name="ciri_awal" rows="10" required>{{ $guideline->ciri_awal }}</textarea>
        </div>

        <div class="mb-3">
            <label for="pertolongan_pertama" class="form-label">Pertolongan yang Dapat Dilakukan</label>
            <textarea class="form-control" id="pertolongan_pertama" name="pertolongan_pertama" rows="10" required>{{ $guideline->pertolongan_pertama }}</textarea>
        </div>

        <div class="mb-3">
            <label for="harus_dihindari" class="form-label">Hal yang Harus Dihindari</label>
            <textarea class="form-control" id="harus_dihindari" name="harus_dihindari" rows="10" required>{{ $guideline->harus_dihindari }}</textarea>
        </div>

        <div class="mb-3">
            <label for="url_guideline" class="form-label">Guideline (URL)</label>
            <input type="url" class="form-control" id="url_guideline" name="url_guideline" value="{{ $guideline->url_guideline }}" required>
        </div>            

        <br>
        <center>
        <button type="submit" class="btn btn-primary" style="background-color: #00B9AD; border-color: #00B9AD;">Update Tips Kesehatan Mental</button>
    </form>

    <br>
    <br> 

    @if (session('message'))
        <script type="text/javascript">
        Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: "{{ session('message') }}",
        confirmButtonText: 'OK'
            })
        </script>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    @endif

@endsection
