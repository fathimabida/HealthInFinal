@extends('layouts.layout')

@section('content')
<br>
<div class="container mt-5">
    <br>
    <h2 class="text-center">Form Dukungan Kesehatan Mental</h2>

    <!-- Form Pemesanan -->
    <form method="POST" action="{{ route('storeGuideline') }}" enctype="multipart/form-data">
        @csrf 
        <br>
        <br>
        <div class="mb-3">
            <label for="section" class="form-label">Mental Health Section</label>
            <select class="form-control" id="section" name="section" required onchange="toggleCustomOption(this)">
                <option value="Choose one...">Choose One...</option>
                <option value="Depression">Depression</option>
                <option value="Eating disorders">Eating disorders</option>
                <option value="Psychosis">Psychosis</option>
                <option value="Non-suicidal self-injury">Non-suicidal self-injury</option>
                <option value="Panic attacks">Panic attacks</option>
                <option value="Suicidal thoughts and behaviours">Suicidal thoughts and behaviours</option>
                <option value="other">Other...</option>
            </select>
        </div>
        <div class="mb-3" id="customOptionDiv" style="display:none;">
            <label for="custom_option" class="form-label">Tuliskan Section</label>
            <input type="text" class="form-control" id="custom_option" name="custom_option">
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
            <input type="text" class="form-control" id="judul_guideline" name="judul_guideline" required>
        </div>

        <div class="mb-3">
            <label for="ciri_awal" class="form-label">Ciri Awal</label>
            <textarea class="form-control" id="ciri_awal" name="ciri_awal" rows="10" required></textarea>
        </div>

        <div class="mb-3">
            <label for="pertolongan_pertama" class="form-label">Pertolongan yang Dapat Dilakukan</label>
            <textarea class="form-control" id="pertolongan_pertama" name="pertolongan_pertama"  rows="10" required></textarea>
        </div>

        <div class="mb-3">
            <label for="harus_dihindari" class="form-label">Hal yang Harus Dihindari</label>
            <textarea class="form-control" id="harus_dihindari" name="harus_dihindari"  rows="10" required></textarea>
        </div>

        <div class="mb-3">
            <label for="url_guideline" class="form-label">Guideline (URL)</label>
            <input type="url" class="form-control" id="url_guideline" name="url_guideline" required>
        </div>            

        <br>
        <center>
            <a href="{{ route('listGuideline') }}" class="btn btn-secondary mr-2" style="background-color: #6c757d; border-color: #6c757d;">Kembali ke Daftar Guideline</a>
            <button type="submit" class="btn btn-primary" style="background-color: #00B9AD; border-color: #00B9AD;">Tambah Tips Kesehatan Mental</button>
        </center>
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
