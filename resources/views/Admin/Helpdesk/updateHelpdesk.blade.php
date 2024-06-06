@extends('layouts.layout')

    @section('content')

    <br>
    <div class="d-flex flex-column justify-content-center align-items-center vh-100">
        <!-- Recent Card -->
        <div class="col-md-8 mb-3 pt-3" style="background-color: #00B9AD; box-shadow: 0 4px 8px rgba(0,0,0,0.2); border-radius: 10px;">
            <div class="card-body">
               <h2 class="card-title text-center mb-3" style="color: #ffffff">Update Kontak Bantuan </h2>
            </div>
        </div>
    

        <!-- Form Pemesanan -->
        <div class="col-md-8 mb-5" style="background-color: #ffffff; box-shadow: 0 4px 8px rgba(0,0,0,0.2); border-radius: 10px;">
            <form method="POST" action="{{ route('helpdeskReplace', ['id' => $helpdesk->id]) }}">

                @csrf 
                <center>
                <div class="col-md-12 mb-3 pt-3">
                    <label for="nama_layanan" class="form-label" style="font-weight: bold; font-size: 20px;">Nama Layanan</label>
                    <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" value="{{ $helpdesk->nama_layanan }}" required style="width: 90%; height: 40px; padding: 10px; font-size: 18px;">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="link_direct" class="form-label" style="font-weight: bold; font-size: 20px;">Link Direct</label>
                    <input type="text" class="form-control" id="link_direct" name="link_direct" value="{{ $helpdesk->link_direct }}" required style="width: 90%; height: 40px; padding: 10px; font-size: 18px;">
                </div>
                <center>
                <button type="submit" class="btn btn-primary" style="background-color: #00B9AD; border-color: #00B9AD;" >Update Kontak Bantuan</button>
                <br>
                <br>
            </form>

        </div>    

        @if (session('message'))
            <script type="text/javascript">
            Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: "{{ session('message') }}",
            confirmButtonText: 'OK'
                })
            </script>
        @endif

        @if ($errors->any())
     <div class="alert alert-danger">
         <ul>
             @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>
    </div>
 @endif


@endsection