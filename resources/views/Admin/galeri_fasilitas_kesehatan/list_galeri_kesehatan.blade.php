@extends('layouts.layout')


@section('addStyle')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
@endsection


@section('content')
    <div class="container mt-5 mb-5">

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif


        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Data Galeri Kesehatan</h3>
                <a class="btn btn-primary" href="{{ route('admin.tambah_galeri_kesehatan') }}">
                    <span class="fas fa-plus"></span> Tambah Data
                </a>
            </div>
            <div class="card-body">

                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Fasilitas</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($galeri as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img class="rounded" src="{{ asset('storage/' . $item->foto) }}"
                                        alt="Foto Fasilitas Kesehatan" width="250" height="250">
                                </td>
                                <td>{{ $item->nama_fasilitas }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>
                                    <a class="btn btn-warning text-white"
                                        href="{{ route('admin.edit_galeri_kesehatan', $item->id) }}">
                                        <span class="fas fa-pencil"></span>
                                    </a>

                                    <a class="btn btn-danger text-white"
                                        href="{{ route('admin.hapus_galeri_kesehatan', $item->id) }}">
                                        <span class="fas fa-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>
        </div>
    </div>
@endsection

@section('addScript')

    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>

    <script>
        new DataTable('#example');
    </script>
@endsection
