@extends('layouts.layout')

@section('content')

<!-- <img src="{{url('asset/bg.admin.listdokter.jpg')}}" class="w-100 h-55" alt="" style="position: absolute; object-fit: cover; z-index: -1;"> -->
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8 d-flex justify-content-center mt-3">
            <div class = "card mb-4" style = "width: 900px;">
                <div class = "card-header" style = "background-color: #1B6065; color : white">Update Doctor</div>
                    <div class = "card-body" style="background-color: #F6F5F5;">
                        <form action="{{ route('admin.update.listDokter', ['id' => $doctors->id]) }}" method= "post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-1">Nama :</label><br>
                                    <input type="text" name="name" id="name" value="{{$doctors->name}}" class="form-control mb-2" required>

                                    <label class="mb-1">Spesialis :</label><br>
                                    <input type="text" name="specialist" id="specialist" value="{{$doctors->specialist}}" class="form-control mb-2" required>

                                    <label class="mb-1">Jam Kerja :</label><br>
                                    <input type="text" name="operational_hour" id="operational_hour" value="{{$doctors->operational_hour}}" class="form-control mb-2" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-1">Gender :</label><br>
                                    <select name="gender" id="gender" class="form-control mb-2" required>
                                        <option value="-" @if($doctors->gender == '-') selected @endif>-</option>
                                        <option value="Laki-Laki" @if($doctors->gender == 'Laki-Laki') selected @endif>Laki-Laki</option>
                                        <option value="Perempuan" @if($doctors->gender == 'Perempuan') selected @endif>Perempuan</option>
                                    </select>

                                    <label for="photo" class="form-label">Foto :</label><br>
                                    <img src="{{ asset('asset/'. $doctors->photo) }}" alt="Photo {{ $doctors->name }}" width="150">
                                    <input type="file" class="form-control mt-3" name="photo" id="photo" accept="image/*"><br>
                                </div>
                            </div>
                            <input type="submit" value= "Save" class="btn" style = "background-color: #00B9AD; color : #FFFFFF ">
                            <a href= "{{ url('/listDokterA') }}" type="submit" value= "Back" class="btn" style = "background-color: #1B6065 ; color : #FFFFFF ">Back</a></br>
                        </form>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



