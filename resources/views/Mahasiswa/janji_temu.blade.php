<div class="col-md-8">
    <div class="card">
        <h5 class="card-header text-center">List Konsultasi dan Janji</h5>
        <div class="card-body">

            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Daftar janji dan konsultasi yang berlangsung</h5>

                <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Buat Janji
                    Sekarang</button>
            </div>

            <div style="margin-top:20px">
                <table class="table table-striped table-bordered" style="width:100%" id="listDokter">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Dokter</th>
                            <th scope="col">Spesialis</th>
                            <th scope="col">Jam Operasional</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($dokter as $item)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->specialist }}</td>
                                <td>{{ $item->operational_hour }}</td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>



        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Janji Temu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('mahasiswa.janji_temu') }}" method="POST" id="jantem">
                    @csrf


                    <div class="form-group">
                        <label for="">Nama Mahasiswa</label>
                        <input type="text" class="form-control" name="nama_mahasiswa"
                            value="{{ auth()->user()->nama }}" required disabled>
                    </div>

                    {{-- <input type="text" name="id_mahasiswa"> --}}


                    <div class="form-group">
                        <label for="">Dokter</label>
                        <select name="id_dokter" required class="form-control" id="">
                            <option value="" selected disabled>---Pilih Dokter---</option>

                            @foreach ($dokter as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" required>
                    </div>

                    <div class="form-group">
                        <label for="">Jam</label>
                        <input type="time" class="form-control" name="jam" required>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="jantem" class="btn btn-primary">Buat Janji</button>
            </div>
        </div>
    </div>
</div>

@section('addScript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>

    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap4.js"></script>

    <script>
        new DataTable('#listDokter');
    </script>
@endsection
