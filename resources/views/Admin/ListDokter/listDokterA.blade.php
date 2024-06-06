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
    <div class="container">
      <div class="d-flex flex-row justify-content-between align-items-center my-3">
          <form class="d-flex " action="{{url('/listDokterA')}}" method="get">
          <input class="form-control me-2" type="search" name="katakunci" placeholder="Search" value="{{ Request::get('katakunci') }}" aria-label="search">
              <button class="btn btn-custom" style="background-color:#00B9AD; color:#FFFFFF" type="submit">Search</button>
          <a href= "{{ url('/listDokterA') }}" type="submit" value= "Reset" class="btn btn-outline-success ms-2">Reset</a></br>
          </form>
          <a href="{{ url('/admin/createListDokter') }}" class ="btn btn-sm" title = "Add New Item" style = "background-color: #00B9AD ; color : #FFFFFF"><i class = " fa fa-plus-circle px-1"></i></a>
      </div>
      @if (count($doctors) > 0)
      <div class="table-responsive">
        <table class="table">
          <thead style="background-color: #1B6065; color:#FFFFFF">
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Specialist</th>
              <th>Operational Hour</th>
              <th>Photo</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = $doctors->firstItem()?>
            @foreach ($doctors as $doctor)
            <tr>
              <td>{{ $i }}</td>
              <td>{{ $doctor->name}}</td>
              <td>{{ $doctor->specialist}}</td>
              <td>{{ $doctor->operational_hour}}</td>
              <td>
                <img src="{{ asset('asset/' . $doctor->photo) }}"
                      alt="Photo Doctor {{ $doctor->name }}" width="150">
              </td>
              <td>
                <div class="d-flex">
                  <a href="{{route ('admin.edit.listDokter', ['id' => $doctor->id])}}"><button name="edit" class = "btn btn-primary btn-sm"><i class = "fa fa-pencil-square-o px-1"></i></button></a>
                  <form action="{{route ('admin.delete.listDokter', ['id' => $doctor->id])}}" method="post">
                      @method('DELETE')
                      @csrf
                      <button name="delete" type="submit" class="btn btn-danger btn-sm ms-2"
                          onclick="return confirm('Anda yakin ingin menghapus data ?')"><i class = "fa fa-trash-o px-1"></i></button>
                  </form>
                </div>
              </td>    
            </tr>
            <?php $i++ ?>
            @endforeach
          </tbody>
        </table>
        {{ $doctors->links() }}
      </div>
      @else
        <p>Dokter tidak ditemukan</p>
      @endif
    </div>
  </section>
@endsection