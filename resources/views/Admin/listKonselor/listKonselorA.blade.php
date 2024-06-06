@extends('layouts.layout')

@section('content')
@if(session('success'))
    <div class="alert alert-success mt-3 mx-3">
        {{ session('success') }}
    </div>
@endif
@if(session('danger'))
    <div class="alert alert-danger mt-3 mx-3">
        {{ session('danger') }}
    </div>
@endif
  <section id="list">
    <div class="container-fluid">
      <div class="d-flex flex-row justify-content-between align-items-center my-3">
          <form class="d-flex " action="{{url('/listKonselorA')}}" method="get">
          <input class="form-control me-2" type="search" name="katakunci" placeholder="Search" value="{{ Request::get('katakunci') }}" aria-label="search">
              <button class="btn btn-custom" style="background-color:#00B9AD; color:#FFFFFF" type="submit">Search</button>
          <a href= "{{ url('/listKonselorA') }}" type="submit" value= "Reset" class="btn btn-outline-success ms-2">Reset</a></br>
          </form>
          <a href="{{ url('/admin/createListKonselor') }}" class ="btn btn-sm" title = "Add New Item" style = "background-color: #00B9AD ; color : #FFFFFF"><i class = " fa fa-plus-circle px-1"></i></a>
      </div>
      @if (count($counselors) > 0)
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead style="background-color: #1B6065; color:#FFFFFF">
            <tr class="justify-content-center">
              <th>No</th>
              <th style="width: 180px;">Name</th>
              <th style="width: 200px;">Specialist</th>
              <th>Phone</th>
              <th>Operational Hour</th>
              <th>Method</th>
              <th>Photo</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = $counselors->firstItem()?>
            @foreach ($counselors as $counselor)
            <tr>
              <td>{{ $i }}</td>
              <td>{{ $counselor->nama_konselor}}</td>
              <td>{{ $counselor->spesialis}}</td>
              <td>{{ $counselor->no_hp}}</td>
              <td>{{ $counselor->jam_kerja}}</td>
              <td>{{ $counselor->metode_konsultasi}}</td>
              <td>
                <img src="{{ asset('asset/' . $counselor->photo) }}"
                      alt="Photo counselor {{ $counselor->name }}" width="150">
              </td>
              <td>
                <div class="d-flex  ">
                  <a href="{{route ('admin.edit.listKonselor', ['id' => $counselor->id])}}"><button class = "btn btn-primary btn-sm"><i class = "fa fa-pencil-square-o px-1"></i></button></a>
                  <form action="{{route ('admin.delete.listKonselor', ['id' => $counselor->id])}}" method="post">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-danger btn-sm ms-2"
                          onclick="return confirm('Anda yakin ingin menghapus data ?')"><i class = "fa fa-trash-o px-1"></i></button>
                  </form>
                </div>
              </td>    
            </tr>
            <?php $i++ ?>
            @endforeach
          </tbody>
        </table>
        {{ $counselors->links() }}
      </div>
      @else
        <p>Konselor tidak ditemukan</p>
      @endif
    </div>
  </section>
@endsection