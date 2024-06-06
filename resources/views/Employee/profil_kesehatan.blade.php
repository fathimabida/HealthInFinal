    @section('addStyle')


        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.css">
    @endsection

    <div class="col-md-8">
        <div class="card" style="border-radius:20px;background-color:white;border:none;box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.1);">
            <h3 class="mt-4 ml-5">Daftar Profil Kesehatan Mahasiswa</h3>
            <div class="card-body px-5">

                @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif

                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th width=10>Nama Mahasiswa</th>
                            <th width=10>Tinggi Badan</th>
                            <th width=10>Berat Badan</th>
                            <th width=10>Gol. Darah</th>
                            <th>Riwayat Alergi</th>
                            <th>Riwayat Penyakit</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($profil_kesehatan as $item)

                        <tr>
                            <td>{{ $item->mahasiswa->nama }}</td>
                            <td>{{ $item->tinggi_badan }} Cm</td>
                            <td>{{ $item->berat_badan }} Kg</td>
                            <td >{{ $item->golongan_darah }}</td>
                            <td>{{ $item->riwayat_alergi }}</td>
                            <td>{{ $item->riwayat_penyakit }}</td>
                        </tr>

                        @endforeach



                    </tbody>

                </table>




            </div>
        </div>
    </div>

    @section('addScript')


    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap4.js"></script>

    <script>
        new DataTable('#example');
    </script>

    @endsection

