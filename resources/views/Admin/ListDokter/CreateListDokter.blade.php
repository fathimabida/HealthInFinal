@extends('layouts.layout')

@section('content')

<div class="position-relative" style="height: calc(100vh - 60px);">
    <!-- <img src="{{url('asset/bg.admin.listdokter.jpg')}}" class="w-100 h-100" alt="" style="position: absolute; object-fit: cover; z-index: -1;"> -->
    <div class="d-flex justify-content-center align-items-center" style="height: 92vh;">
        <div class = "card" style = "width: 750px;">
            <div class = "card-header" style = "background-color: #1B6065; color : white">Detail Dokter</div>
                <div class = "card-body" style="background-color: #F6F5F5;">
                    <form action="{{ route('admin.store.listDokter') }}" method= "post" enctype="multipart/form-data">
                    {!! csrf_field() !!} 
                        <label class="mb-1">Nama :</label></br>
                        <input type="text" name="name" id = "name" class="form-control mb-2" required>

                        <label class="mb-1">Spesialis :</label></br>
                        <input type="text" name="specialist" id = "specialist" class="form-control mb-2" required>

                        <label class="mb-1">Jam Kerja :</label></br>
                        <input type="text" name="operational_hour" id = "operational_hour" class="form-control mb-2" required>

                        <label class="mb-1">Gender :</label></br>
                        <select name="gender" id="gender" class="form-select mb-2" required>
                            <option value="">-</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>

                        <label for="photo" class="form-label mb-1">Foto :</label>
                        <input type="file" class="form-control" name="photo" id="photo" accept="image/*" required></br>

                        <input type="submit" value= "Save" class="btn" style = "background-color: #00B9AD; color : #FFFFFF ">
                        <a href= "{{ url('/listDokterA') }}" type="submit" value= "Back" class="btn" style = "background-color: #1B6065 ; color : #FFFFFF ">Back</a></br>
                    </form>
                </div>
            </div>
        </div> 
    </div> 
</div>
    @endsection





