@extends('layoutsMhs.layout')


@section('addStyle')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
@endsection


@section('content')
    <div class="container mt-5 mb-5">

        <!-- @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif -->


        <div class="card">
            <div class="card-header d-flex justify-content-center align-items-center">
                <h3 class="m-0">Hasil Konseling</h3>   
            </div>
            <div class="card-body">

                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-start">No</th>
                            <th class="text-start">Konselor</th>
                            <th class="text-start">Tanggal Konseling</th>
                            <th class="text-start">Metode</th>
                            <th class="text-start">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($counselings as $counseling)
                            <tr>
                                <td class="text-start">{{ $no++ }}</td>
                                <td class="text-start">{{ $counseling->konselor }}</td>
                                <td class="text-start">{{ $counseling->tanggal_konseling }}</td>
                                <td class="text-start">{{ $counseling->metode }}</td>
                                <td class="text-start">
                                    <a href="{{route ('mahasiswa.detail.konseling', ['id' => $counseling->id])}}"><button class = "btn btn-primary btn-sm"><i class = "fas fa-external-link-alt mr-1"></i></button></a>
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
