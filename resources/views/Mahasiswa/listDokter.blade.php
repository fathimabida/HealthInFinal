@extends('layoutsMhs.layout')

@section('content')
    <div class="container-fluid d-flex justify-content-center p-0">
        <section class="col-lg-4 me-2">
            <div class="d-flex justify-content-center ms-5">

                <div class="row">
                    <div class="card mt-5 ms-4 p-0" style="width: 19rem;">
                        <form action="/listdokter" method="GET">
                            @csrf
                            <div class="card-header mb-2 container-fluid text-center"
                                style="background-color: #00B9AD; color:#FFFFFF;font-weight: bold;">
                                List Dokter
                            </div>
                            <div class="mb-2 mx-4">
                                <label class="form-label">Nama Dokter</label>
                                <input class="form-control" type="search" name="name" placeholder="Search"
                                    value="{{ Request::get('name') }}" aria-label="search">
                            </div>
                            <div class="mb-2 mx-4">
                                <label class="form-label">Spesialis</label>
                                <input class="form-control" type="search" name="specialist" placeholder="Search"
                                    value="{{ Request::get('specialist') }}" aria-label="search">
                            </div>
                            <div class="mb-3 mx-4">
                                <label for="gender" class="form-label">Pilih Gender</label>
                                <select name="gender" id="gender" class="form-select">
                                    <option value="">Gender</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-center mb-3">
                                <button type="Submit" class="btn btn-custom"
                                    style = "background-color: #00B9AD ; color : #FFFFFF">Search</button>
                                    <a href= "{{ url('/listdokter?reset=true') }}" type="submit" value= "reset" name= "reset" class="btn btn-outline-success ms-2">Reset</a></br>
                            </div>
                        </form>
                    </div>

                    <div class="mt-2 ms-4 mb-3" style="width: 19rem;">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary w-100 mt-2" data-toggle="modal"
                            data-target="#exampleModal">
                            Buat Janji Temu
                        </button>
                    </div>
                </div>
            </div>
        </section>


        <section class="col-lg-6 col-12 p-0 mt-5 me-5">


            @if (Session::has('success'))
                <div class="col-lg-11 alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row row-cols-1 row-cols-md-2 g-2">
                @if (session('message'))
                    <div class="alert alert-warning w-100 text-center ms-4">
                        {{ session('message') }}
                    </div>
                @endif
                @foreach ($doctors as $doctor)
                    <div class="col">
                        <div class="card mb-4 me-5" style="width: 19rem;">
                            <img src="/asset/{{ $doctor->photo }}"
                                style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%" class="card-img-top"
                                alt="Foto Dokter">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size:18px; color: #00B9AD">{{ $doctor->name }}</h5>
                                <i class="card-text" style="font-size:16ix;color:gray">{{ $doctor->specialist }}</i>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" style="background-color: #00B9AD; color: white">
                                    <i class="fas fa-clock me-1" style="color:white"></i> {{ $doctor->operational_hour }}
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>

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

                    <form action="{{ route('mahasiswa.janji_temu') }}" method="POST" id="form_janjitemu">
                        @csrf

                        <div class="form-group">
                            <label for="">Nama Mahasiswa</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->nama }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="">Dokter</label>
                            <select name="id_dokter" id="id_dokter" class="form-control" required>
                                <option value="" selected disabled>--Pilih Dokter---</option>
                                @foreach ($doctors as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal">
                        </div>

                        <div class="form-group">
                            <label for="">Jam</label>
                            <input type="time" class="form-control" name="jam">
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="form_janjitemu" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection
