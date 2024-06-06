@extends('layouts.layout')

@section('content')

<div class="position-relative" style="height: calc(100vh - 60px);">
    <!-- <img src="{{url('asset/bg.admin.listdokter.jpg')}}" class="w-100 h-100" alt="" style="position: absolute; object-fit: cover; z-index: -1;"> -->
    <div class="d-flex justify-content-center align-items-center" style="height: 85vh;">
        <div class = "card" style = "width: 750px;">
            <div class = "card-header" style = "background-color: #1B6065; color : white">Detail Konselor</div>
                <div class = "card-body" style="background-color: #F6F5F5;">
                    <form action="{{ route('admin.store.listKonselor') }}" method= "post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-md-6">
                                <label class="mb-1">Nama :</label>
                                <input type="text" name="nama_konselor" id="nama_konselor" class="form-control mb-2" required>

                                <label class="mb-1">Spesialis :</label>
                                <input type="text" name="spesialis" id="spesialis" class="form-control mb-2" required>

                                <label class="mb-1">No HP :</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control mb-2" required oninput="this.value = this.value.replace(/[^0-9]/g, '')">

                                <label class="mb-1">Jam Kerja :</label>
                                <input type="text" name="jam_kerja" id="jam_kerja" class="form-control mb-2" required>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-1">Metode :</label>
                                <select name="metode_konsultasi" id="metode_konsultasi" class="form-control mb-2" required>
                                    <option value="Pilih Metode Konsultasi">-</option>
                                    <option value="daring">Daring</option>
                                    <option value="luring">Luring</option>
                                    <option value="daring - luring">Daring & Luring</option>
                                </select>

                                <label class="mb-1">Gender :</label>
                                <select name="gender" id="gender" class="form-select mb-2" required>
                                    <option value="-">-</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>

                                <label for="photo" class="form-label mb-1">Foto :</label>
                                <input type="file" class="form-control" name="photo" id="photo" accept="image/*" required></br>
                            
                                <input type="submit" value="Save" class="btn mt-3" style="background-color: #00B9AD; color: #FFFFFF;">
                                <a href="{{ url('/listKonselorA') }}" class="btn mt-3" style="background-color: #1B6065; color: #FFFFFF;">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  

@endsection
