@extends('layoutsMhs.layout')

@section('content')

<div class="position-relative">
    <div class="d-flex justify-content-center align-items-center" style="height: 110vh;">
        <div class="row justify-content-center flex-column">
            <div class="col-md-6 mb-3">
                <div class="card" style="width: 950px;">
                    <div class="card-header" style="background-color: #1B6065; color: white;">Informasi Pribadi</div>
                    <div class="card-body" style="background-color: #F6F5F5;">
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label class="mb-1">Nama :</label><br>
                                <input type="text" name="nama" id="nama" class="form-control" required disabled value="{{ $counseling->nama}}" disabled>
                            </div>
                            <div class="col-md-3">
                                <label class="mb-1">NIM :</label><br>
                                <input type="text" name="nim" id="nim" class="form-control" required disabled value="{{ $counseling->nim }}">
                            </div>
                            <div class="col-md-3">
                                <label class="mb-1">No HP :</label><br>
                                <input type="number" name="no_hp" id="no_hp" class="form-control" required disabled value="{{ $counseling->no_hp }}">
                            </div>
                            <div class="col-md-3">
                                <label class="mb-1">Prodi :</label><br>
                                <input type="text" name="prodi" id="prodi" class="form-control" required disabled value="{{ $counseling->prodi }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="width: 950px;">
                    <div class="card-header" style="background-color: #1B6065; color: white;">Hasil Konseling</div>
                    <div class="card-body" style="background-color: #F6F5F5;">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="mb-1">Konselor :</label><br>
                                <input type="text" name="konselor" id="konselor" class="form-control mb-2" required disabled value="{{ $counseling->konselor }}">

                                <label class="mb-1">Diagnosa :</label><br>
                                <input type="text" name="diagnosa" id="diagnosa" class="form-control mb-2" required disabled value="{{ $counseling->diagnosa }}">

                                <label class="mb-1">Deskripsi :</label><br>
                                <textarea name="deskripsi" id="deskripsi" class="form-control mb-2" rows="5" required disabled>{{ $counseling->deskripsi }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-1">Tanggal Konseling :</label><br>
                                <input type="date" name="tanggal_konseling" id="tanggal_konseling" class="form-control mb-2" required disabled value="{{ $counseling->tanggal_konseling }}">

                                <label class="mb-1">Metode :</label><br>
                                <select name="metode" id="metode" class="form-control mb-2" required disabled value="{{ $counseling->metode }}">
                                    <option value="-">-</option>
                                    <option value="daring">Daring</option>
                                    <option value="luring">Luring</option>
                                </select>

                                <label class="mb-1">Rekomendasi :</label><br>
                                <textarea type="text" name="rekomendasi" id="rekomendasi" class="form-control mb-2" rows="3" required disabled>{{ $counseling->rekomendasi }}</textarea>
                            </div>
                        </div>
                        <a href="{{ url('/hasilKonseling') }}" type="submit" value="Back" class="btn mt-2" style="background-color: #1B6065; color: #FFFFFF;">Back</a><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection