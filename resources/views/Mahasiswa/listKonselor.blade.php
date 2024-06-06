@extends('layoutsMhs.layout')

@section('content')
<div class="container-fluid d-flex justify-content-center p-0">
        <section class="col-lg-4 me-2">
            <div class="d-flex justify-content-center ms-5">
                <div class="card mt-5 ms-4 mb-4" style="width: 19rem;"> 
                    <form action="/listKonselor" method="GET">
                        @csrf
                        <div class="card-header mb-2 text-center" style=" background-color: #00B9AD; color:#FFFFFF;font-weight: bold;">
                            List Konselor Telkom University
                        </div>
                        <div class="mb-2 mx-4">
                            <label class="form-label">Nama Konselor: </label>
                            <input class="form-control" type="search" name="nama_konselor" placeholder="Search" value="{{ Request::get('nama_konselor') }}" aria-label="search">
                        </div>
                        <div class="mb-2 mx-4">
                            <label class="form-label">Spesialis: </label>
                            <input class="form-control" type="search" name="spesialis" placeholder="Search" value="{{ Request::get('spesialis') }}" aria-label="search">
                        </div>
                        <div class="mb-2 mx-4">
                            <label for="metode_konsultasi" class="form-label">Metode Konsultasi: </label>
                            <select name="metode_konsultasi" id="metode_konsultasi" class="form-select">
                                <option value="">Pilih Metode Konsultasi</option>
                                <option value="daring">Daring</option>
                                <option value="luring">Luring</option>  
                            </select>
                        </div>
                        <div class="mb-3 mx-4">
                            <label for="gender" class="form-label">Gender: </label>
                            <select name="gender" id="gender" class="form-select">
                                <option value="">Pilih Gender</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <button type="Submit" class="btn btn-custom" style = "background-color: #00B9AD ; color : #FFFFFF">Search</button>
                            <a href= "{{ url('/listKonselor?reset=true') }}" type="submit" value= "reset" name= "reset" class="btn btn-outline-success ms-2">Reset</a></br>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="col-lg-6 col-12 p-0 mt-5 me-5">
            <div class="row row-cols-1 row-cols-md-2 g-2">
            @if (session('message'))
                <div class="alert alert-warning w-100 text-center ms-4">
                    {{ session('message') }}
                </div>
            @endif
            @foreach($counselors as $counselor)
<div class="col">
    <div class="card mb-4 me-5" style="width: 19rem;">
        <img src="/asset/{{$counselor->photo}}" style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%;" class="card-img-top" alt="Foto Konselor">
        <div class="card-body d-flex flex-column justify-content-between">
            <div style="height:55px">
                <h5 class="card-title" style="font-size:18px; color: #00B9AD">{{$counselor->nama_konselor}}</h5>
            </div>
            <div style="height:55px">
                <p class="card-text" style="font-family: inherit; color:gray">
                    <i class="fas fa-user-md me-1" style="font-size:16px; color:black"></i>
                    <em>{{$counselor->spesialis}}</em>
                </p>
            </div>
            <div>
                <p class="card-text" style="font-family: inherit;">
                    <i class="fas fa-clock me-1" style="font-size:16px; color:black"></i>
                    {{$counselor->jam_kerja}}
                </p>
                <p class="card-text" style="font-family: inherit;">
                    <i class="fas fa-phone me-1" style="font-size:16px; color:gray"></i>
                    {{$counselor->no_hp}}
                </p>
            </div>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item text-center" style="background-color: #00B9AD; color: white;">
                {{strtoupper ($counselor->metode_konsultasi)}}
            </li>
        </ul>
    </div>
</div>
@endforeach

            </div>
        </section>
    </div>
@endsection