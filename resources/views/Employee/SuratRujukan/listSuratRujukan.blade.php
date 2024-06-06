@extends('layouts.layout')

@section('content')

    <div class="d-flex flex-column justify-content-center align-items-center pt-5">
        <!-- Recent Card -->
        <div class="col-md-10 mb-5 pt-2" style="background-color: #00B9AD; box-shadow: 0 4px 8px rgba(0,0,0,0.2); border-radius: 10px;">
            <div class="card-body">
               <h2 class="card-title text-center mb-3" style="color: #ffffff"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
              </svg> List Surat Rujukan </h2>
            </div>
        </div>

    <div class="col-md-10 mb-5" style="background-color: #ffffff; box-shadow: 0 4px 8px rgba(0,0,0,0.2); border-radius: 10px;">
        <div class="card-body">
           <table class="table table-hover table-striped">
            <thead style="font-size: 15px;">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Dokter Tujuan Rujukan</th>
                  <th scope="col">Rumah Sakit Rujukan</th>
                  <th scope="col">Dokter Perujuk</th>
                  <th scope="col">Tanggal Rujukan</th>
                  <th scope="col">NIM Pasien</th>
                  <th scope="col">Nama Pasien</th>
                  <th scope="col">Diagnosa</th>
                  <th scope="col">Masa Berlaku Rujukan</th>
                  <th scope="col">Action</th>

                </tr>
              </thead>
              <tbody style="font-size: 16px;">
              @foreach ($suratrujukans as $suratrujukan)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $suratrujukan->dokter_rujukan}}</td>
                  <td>{{ $suratrujukan->rs_rujukan}}</td>
                  <td>{{ $suratrujukan->dokter_perujuk}}</td>
                  <td>{{ $suratrujukan->tgl_rujuk}}</td>
                  <td>{{ $suratrujukan->nim_pasien}}</td>
                  <td>{{ $suratrujukan->nama_pasien}}</td>
                  <td>{{ $suratrujukan->diagnosa}}</td>
                  <td>{{ $suratrujukan->masa_berlaku}}</td>
                  <td>

                    <button type="submit" class="btn btn-primary" style="background-color: #00B9AD; border-color: #00B9AD;">
                      <a href="{{ route('downloadSuratRujukan', $suratrujukan->id) }}" style="color: white;">Download</a>
                    </button>

                    <form action="{{ route('suratRujukanDelete', $suratrujukan -> id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>
                      </form>

                  </td>
                  
                </tr>
              @endforeach
              </tbody>

          </table>
          <center>
            <a href="#" class="btn btn-primary"  style="background-color: #CDDC22; border-color: #CDDC22; font-weight: bold; color: #ffffff;">Kembali ke Beranda</a>
            <br>
            <br>
        </div>
    </div>

</div>

@endsection
