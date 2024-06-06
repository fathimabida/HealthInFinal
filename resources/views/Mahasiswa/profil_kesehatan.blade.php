 <div class="col-md-8">
        <div class="card" style="border-radius:20px;background-color:white;border:none;box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.1);">
            <h3 class="mt-4 ml-5">Profil Kesehatan Mahasiswa</h3>
            <div class="card-body px-5">

                @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif

                <form action="{{ route('mahasiswa.update_kesehatan') }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="tinggi_badan">Tinggi Badan</label>
                        <input type="number" class="form-control @error('tinggi_badan') is-invalid @enderror" name="tinggi_badan" id="tinggi_badan" required value="{{ $profil_kesehatan->tinggi_badan }}" step='0.01'>
                        @error('tinggi_badan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="berat_badan">Berat Badan</label>
                        <input type="number" class="form-control @error('berat_badan') is-invalid @enderror" name="berat_badan" id="berat_badan" required value="{{ $profil_kesehatan->berat_badan }}" step='0.01'>
                        @error('berat_badan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="golongan_darah">Golongan Darah</label>
                        {{-- <input type="number" class="form-control @error('golongan_darah') is-invalid @enderror" name="golongan_darah" id="golongan_darah" required value="{{ $mahasiswa->golongan_darah }}" step='0.01'> --}}
                        <select class="form-control @error('golongan_darah') is-invalid @enderror" id="golongan_darah" name="golongan_darah" required>

                            <option value="A" {{ $profil_kesehatan->golongan_darah =="A" ? 'selected' :'' }}>A</option>
                            <option value="B" {{ $profil_kesehatan->golongan_darah =="B" ? 'selected' :'' }}>B</option>
                            <option value="AB" {{ $profil_kesehatan->golongan_darah =="AB" ? 'selected' :'' }}>AB</option>
                            <option value="O" {{ $profil_kesehatan->golongan_darah =="O" ? 'selected' :'' }}>O</option>

                        </select>
                        @error('golongan_darah')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="berat_badan">Riwayat Alergi</label>

                        <textarea class="form-control @error('riwayat_alergi') is-invalid @enderror" name="riwayat_alergi" id="riwayat_alergi" cols="30" rows="10"  required>{{ $profil_kesehatan->riwayat_alergi }}</textarea>



                        @error('riwayat_alergi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="berat_badan">Riwayat Penyakit</label>

                        <textarea class="form-control @error('riwayat_penyakit') is-invalid @enderror" name="riwayat_penyakit" id="riwayat_penyakit" cols="30" rows="10" required>{{ $profil_kesehatan->riwayat_penyakit }}</textarea>

                        @error('riwayat_penyakit')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100" style="border-radius:40px;background-color:purple;border:none">Ubah Profil Kesehatan</button>

                </form>


            </div>
        </div>
    </div>

    @section('addScript')
    <script>
        function updateFileName() {
            var input = document.getElementById('validatedCustomFile');
            var fileName = input.files[0].name;
            var label = document.getElementById('fileLabel');
            label.innerHTML = fileName;
        }

            // Fungsi untuk mengupdate nama file untuk gambar latar belakang
    function updateBackgroundFileName() {
        var input = document.getElementById('validatedCustomBackground');
        var fileName = input.files[0].name;
        var label = document.getElementById('backgroundLabel');
        label.innerHTML = fileName;
    }
    </script>



    @endsection
