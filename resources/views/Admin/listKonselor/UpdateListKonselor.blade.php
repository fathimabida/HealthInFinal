@extends('layouts.layout')

@section('content')

<img src="{{url('asset/bg.admin.listkonselor.jpg')}}" class="w-100 h-150" alt="" style="position: absolute; object-fit: cover; z-index: -1;">
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class = "card mb-4" style = "width: 750px;">
                <div class = "card-header" style = "background-color: #1B6065; color : white">Update Counselor</div>
                    <div class = "card-body" style="background-color: #F6F5F5;">
                        <form action="{{ route('admin.update.listKonselor', ['id' => $counselors->id]) }}" method= "post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-1">Nama :</label><br>
                                    <input type="text" name="nama_konselor" id="nama_konselor" value="{{$counselors->nama_konselor}}" class="form-control mb-2" required>

                                    <label class="mb-1">Spesialis :</label><br>
                                    <input type="text" name="spesialis" id="spesialis" value="{{$counselors->spesialis}}" class="form-control mb-2" required>

                                    <label class="mb-1">Jam Kerja :</label><br>
                                    <input type="text" name="jam_kerja" id="jam_kerja" value="{{$counselors->jam_kerja}}" class="form-control mb-2" required>

                                    <label class="mb-1">No Hp :</label><br>
                                    <input type="text" name="no_hp" id="no_hp" value="{{$counselors->no_hp}}" class="form-control mb-2" required oninput="this.value = this.value.replace(/[^0-9]/g, '')">

                                    <label class="mb-1">Metode :</label><br>
                                    <select name="metode_konsultasi" id="metode_konsultasi" class="form-control mb-2" required>
                                        <option value="-" @if($counselors->metode_konsultasi == '-') selected @endif>-</option>
                                        <option value="daring" @if($counselors->metode_konsultasi == 'daring') selected @endif>Daring</option>
                                        <option value="luring" @if($counselors->metode_konsultasi == 'luring') selected @endif>Luring</option>
                                        <option value="daring - luring" @if($counselors->metode_konsultasi == 'daring-luring') selected @endif>Daring & Luring</option>
                                    </select>

                                </div>

                                <div class="col-md-6">
                                    <label class="mb-1">Gender :</label><br>
                                    <select name="gender" id="gender" class="form-control mb-2" required>
                                        <option value="-" @if($counselors->gender == '-') selected @endif>-</option>
                                        <option value="Laki-Laki" @if($counselors->gender == 'Laki-Laki') selected @endif>Laki-Laki</option>
                                        <option value="Perempuan" @if($counselors->gender == 'Perempuan') selected @endif>Perempuan</option>
                                    </select>

                                    <label for="photo" class="form-label">Foto :</label><br>
                                    <img src="{{ asset('asset/'. $counselors->photo) }}" alt="Photo {{ $counselors->name }}" width="150">
                                    <input type="file" class="form-control mt-3" name="photo" id="photo" accept="image/*"><br>
                                </div>
                            </div>
                            <input type="submit" value= "Save" class="btn mt-3" style = "background-color: #00B9AD; color : #FFFFFF ">
                            <a href= "{{ url('/listKonselorA') }}" type="submit" value= "Back" class="btn mt-3" style = "background-color: #1B6065 ; color : #FFFFFF ">Back</a></br>
                        </form>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection