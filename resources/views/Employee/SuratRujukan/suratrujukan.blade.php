@extends('layouts.layout')

    @section('content')
    <br>
    <div class="container mt-5">
        <br>
        <h2 class="text-center">Form Surat Rujukan</h2>

        <!-- Form Pemesanan -->
        <form method="POST" action="{{ route('storeSuratRujukan') }}" enctype="multipart/form-data">

            @csrf 

            <div class="mb-3">
                <label for="dokter_rujukan" class="form-label">Dokter Rujukan</label>
                <input type="text" class="form-control" id="dokter_rujukan" name="dokter_rujukan" required>
            </div>
            <div class="mb-3">
                <label for="rs_rujukan" class="form-label">Rumah Sakit Rujukan</label>
                <select class="form-control" id="rs_rujukan" name="rs_rujukan" required>
                    <option value="Choose one...">Choose One...</option>
                    <option value="Bina Sehat">RS Bina Sehat</option>
                    <option value="Al-Ihsan">RS Al-Ihsan</option>
                    <option value="Muhammadiyah">RS Muhammadiyah</option>
                    <option value="Al-Islam">RS Al-Islam</option>
                    <option value="Edelweiss">RS Edelweiss</option>
                    <option value="Immanuel">RS Immanuel</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="dokter_perujuk" class="form-label">Dokter Perujuk</label>
                <input type="text" class="form-control" id="dokter_perujuk" name="dokter_perujuk" required>
            </div>
            <div class="mb-3">
                <label for="tgl_rujuk" class="form-label">Tanggal Rujukan</label>
                <input type="date" class="form-control" id="tgl_rujuk" name="tgl_rujuk" required>
            </div>
            <div class="mb-3">
                <label for="nim_pasien" class="form-label">NIM Pasien</label>
                <input type="text" class="form-control" id="nim_pasien" name="nim_pasien" required>
            </div>
            <div class="mb-3">
                <label for="nama_pasien" class="form-label">Nama Pasien</label>
                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" required>
            </div>
            <div class="mb-3">
                <label for="diagnosa" class="form-label">Diagnosa</label>
                <input type="text" class="form-control" id="diagnosa" name="diagnosa" required>
            </div>
            <div class="mb-3">
                <label for="masa_berlaku" class="form-label">Rujukan Berlaku Sampai</label>
                <input type="date" class="form-control" id="masa_berlaku" name="masa_berlaku" required>
            </div>

            <div class="mb-3">
                    <input type="file" id="file_surat" name="file_surat">
            </div>

            <br>
            <button type="submit" class="btn btn-primary" style="background-color: #00B9AD; border-color: #00B9AD;">Buat Surat Rujukan</button>
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