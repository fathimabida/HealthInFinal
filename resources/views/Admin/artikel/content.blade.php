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
                <h3>List Artikel</h3>

                <a class="btn btn-primary" href="{{ route('admin.tambah-artikel') }}">
                    Tambah Artikel
                </a>

            </div>
            <div class="card-body">

                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th width="2">No</th>
                            <th  width="100">Cover Artikel</th>
                            <th>Judul Artikel</th>
                            <th width="200">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($artikel as $item)
                        
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                <img class="rounded" src="{{ asset('storage/' . $item->cover) }}"
                                        alt="Cover Artikel" width="250" height="250">
                            </td>
                            <td>{{ $item->judul }}</td>
                            <td>
                                <a href="{{ route('admin.detail-artikel', $item->id) }}" class="btn btn-info btn-sm mb-2" style="color:white">
                                    <span class="fas fa-info"> </span>
                                    Detail
                                </a>
                                <a href="{{ route('admin.hapus-artikel',$item->id) }}" class="btn btn-danger btn-sm mb-2" style="color:white">
                                    <span class="fas fa-trash"> </span>
                                    Hapus
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
