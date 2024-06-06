@extends('Mahasiswa.mahasiswa')

@section('content')
<<<<<<< HEAD
    <div class="container">
        <h1 class="text-center mb-4 mt-5">Hasil Medical Check-Up Mahasiswa</h1>
        
        {{-- Periksa apakah data berhasil diterima --}}
        {{-- @dd($mcu_results) --}} {{-- Jika telah dipastikan berhasil, Anda bisa menghapusnya --}}

        @if ($mcu_results->isEmpty())
            <div class="alert alert-info text-center" role="alert">
                Tidak ada hasil MCU yang tersedia.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="custom-thead">
                        <tr>
                            <th scope="col">Nama Pasien</th>
                            <th scope="col">Jenis Pemeriksaan</th>
                            <th scope="col">Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mcu_results as $result)
                            <tr>
                                <td>{{ $result->nama_pasien }}</td>
                                <td>{{ $result->nama_pemeriksaan }}</td>
                                <td>
                                    @if ($result->hasil == 'Normal')
                                        <span class="badge badge-success">{{ $result->hasil }}</span>
                                    @elseif ($result->hasil == 'Tidak Normal')
                                        <span class="badge badge-danger">{{ $result->hasil }}</span>
                                    @else
                                        <span>{{ $result->hasil }}</span>
                                    @endif
=======
    <div class="container mt-5 mb-5">

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header d-flex justify-content-center align-items-center">
                <h3 class="m-0">Hasil MCU</h3>
            </div>
            <div class="card-body">

                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-start">No</th>
                            <th class="text-start">Nama Dokter</th>
                            <th class="text-start">Tanggal MCU</th>
                            <th class="text-start">Hasil</th>
                            <th class="text-start">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($mcu_results as $mcu_result)
                            <tr>
                                <td class="text-start">{{ $no++ }}</td>
                                <td class="text-start">{{ $mcu_result->nama_dokter }}</td>
                                <td class="text-start">{{ $mcu_result->tanggal_mcu }}</td>
                                <td class="text-start">{{ $mcu_result->hasil }}</td>
                                <td class="text-start">
                                    <a href="{{ route('mahasiswa.detail.mcu', ['id' => $mcu_result->id]) }}">
                                        <button class="btn btn-primary btn-sm"><i class="fas fa-external-link-alt mr-1"></i></button>
                                    </a>
>>>>>>> 9ea61cba467d24a9720bc089d806cc0a6a2c065e
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <style>
        .custom-thead {
            background: linear-gradient(to bottom, #60C0D0, #1ABC9C);
            color: #fff;
            border-radius: 12px;
        }
        .table {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }
        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
        }
        .badge {
            font-size: 0.9rem;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 500;
        }
        .badge-success {
            background-color: #28a745;
        }
        .badge-danger {
            background-color: #dc3545;
        }
    </style>
@endsection

@section('addScript')
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>

    <script>
        new DataTable('#example');
    </script>
@endsection