@extends('layouts.layout')

@section('content')

<div class="d-flex flex-column justify-content-center align-items-center pt-5">
    <!-- Recent Card -->
    <div class="col-md-10 mb-5 pt-2" style="background-color: #00B9AD; box-shadow: 0 4px 8px rgba(0,0,0,0.2); border-radius: 10px;">
        <div class="card-body">
            <h2 class="card-title text-center mb-3" style="color: #ffffff">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                </svg>
                List Guideline Dukungan Kesehatan Mental 
            </h2>
        </div>
    </div>

    <div class="col-md-10 mb-5" style="background-color: #ffffff; box-shadow: 0 4px 8px rgba(0,0,0,0.2); border-radius: 10px;">
        <div class="card-body">
            <table class="table table-hover table-striped">
                <thead style="font-size: 15px;">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Guideline Section</th>
                        <th scope="col">Judul Guideline</th>
                        <th scope="col">Ciri Awal</th>
                        <th scope="col">Pertolongan Pertama</th>
                        <th scope="col">Hal yang Dihindari</th>
                        <th scope="col">URL Guideline</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody style="font-size: 16px;">
                    @foreach ($guideline as $guideline)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $guideline->section }}</td>
                            <td>{{ $guideline->judul_guideline }}</td>
                            <td>{{ $guideline->ciri_awal }}</td>
                            <td>{{ $guideline->pertolongan_pertama }}</td>
                            <td>{{ $guideline->harus_dihindari }}</td>
                            <td>{{ $guideline->url_guideline }}</td>
                            <td>
                                <div class="d-flex">
                                    <center>
                                        <a href="{{ route('updateGuideline', ['id' => $guideline->id]) }}" class="btn btn-primary mb-2" style="background-color: #00B9AD; border-color: #00B9AD; color: white;">Edit</a>
                                        <form action="{{ route('deleteGuideline', $guideline->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </center>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <center>
                <a href="{{ route('formDukunganMental') }}" class="btn btn-primary mr-2" style="background-color: #00B9AD; border-color: #00B9AD; font-weight: bold; color: #ffffff;"> + Add New Guideline</a>
                <a href="{{ route('homepageAdmin') }}" class="btn btn-primary" style="background-color: #CDDC22; border-color: #CDDC22; font-weight: bold; color: #ffffff;">Kembali ke Beranda</a>
                <br>
                <br>
            </center>
        </div>
    </div>
</div>

@endsection

