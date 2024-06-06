@section('addStyle')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap4.css">
@endsection

<div class="col-md-8">
    <div class="card p-3"
        style="border-radius:20px;background-color:white;border:none;box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.1);">

        <div class="card-body">



            @if ($janji_temu->count() < 0)
                <h5 class="card-title">Anda tidak memiliki janji yang sedang berlangsung </h5>
            @else
                <h5 class="card-title">List janji temu anda</h5>

                <table id="example" class="table table-striped table-bordered mt-2" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mahasiswa</th>
                            <th>Tanggal</th>
                            <th>Jam</th>

                        </tr>
                    </thead>
                    <tbody>

                        @php
                            $no = 1;
                        @endphp
                        @foreach ($janji_temu as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->mahasiswa->nama }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->jam }}</td>
                            </tr>
                        @endforeach


                    </tbody>

                </table>
            @endif




        </div>
    </div>
</div>

@section('addScript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>

    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap4.js"></script>

    <script>
        new DataTable('#example');
    </script>
@endsection
