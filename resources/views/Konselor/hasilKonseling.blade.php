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
            <form class="d-flex " action="{{url('/konselor/hasilKonseling')}}" method="get">
                <input class="form-control me-2" type="search" name="katakunci" placeholder="Search" value="{{ Request::get('katakunci') }}" aria-label="search">
                <button class="btn btn-custom" style="background-color:#00B9AD; color:#FFFFFF" type="submit">Search</button>  
                <a href= "{{ url('/konselor/hasilKonseling') }}" type="submit" value= "Reset" class="btn btn-outline-success ms-2">Reset</a></br>     
            </form>
            <a href="{{ url('/createHasilKonseling') }}" class ="btn btn-sm" title = "Add New Item" style = "background-color: #00B9AD ; color : #FFFFFF"><i class = " fa fa-plus-circle px-1"></i></a>
            
        </div>
     
        <div class="table-responsive">
          <table class="table">
            <thead style="background-color: #1B6065; color:#FFFFFF">
              <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>Nim</th>
                <th>Tanggal Konseling</th>
                <th>Metode</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            @if($counselings->count() > 0)
              <?php $i = $counselings->firstItem()?>
              @foreach ($counselings as $counseling)
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $counseling->nama}}</td>
                  <td>{{ $counseling->nim}}</td>
                  <td>{{ $counseling->tanggal_konseling}}</td>
                  <td>{{ $counseling->metode}}</td> 
                  <td>
                      <a href="{{route ('konselor.detail.hasilKonseling', ['id' => $counseling->id])}}"><button class = "btn btn-primary btn-sm"><i class = "fas fa-external-link-alt mr-1"></i></button></a>
                  </td>               
                </tr>
                <?php $i++ ?>
              @endforeach
              @else
                <tr>
                    <td colspan="6" class="text-center">No data available in table</td>
                </tr>
                @endif
            </tbody>
        </table>
        {{ $counselings->links() }}
        </div>
        
      
     
    </div>
  </section>

  @endsection