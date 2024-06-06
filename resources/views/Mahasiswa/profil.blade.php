 <div class="col-md-8">
        <div class="card" style="border-radius:20px;background-color:white;border:none;box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.1);">
            <h3 class="mt-4 ml-5">Profil Mahasiswa</h3>
            <div class="card-body px-5">

                @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif

                <form action="{{ route('mahasiswa.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="">Foto Profil</label>

                        <div class="custom-file">
                            <input accept="image/*" type="file" name="foto" class="custom-file-input @error('foto') is-invalid @enderror" id="validatedCustomFile" onchange="updateFileName()">
                            <label class="custom-file-label" for="validatedCustomFile" id="fileLabel">Choose file...</label>

                            @error('foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group mb-3">
                        <label for="">Gambar Latar Belakang</label>

                        <div class="custom-file">
                            <input accept="image/*" type="file" name="background_image" class="custom-file-input @error('background_image') is-invalid @enderror" id="validatedCustomBackground" onchange="updateBackgroundFileName()">
                            <label class="custom-file-label" for="validatedCustomBackground" id="backgroundLabel">Choose file...</label>

                            @error('background_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $mahasiswa->nama }}" required>

                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="form-group mb-3">
                        <label for="nim">NIM</label>
                        <input type="number" class="form-control @error('nim') is-invalid @enderror" name="nim" id="nim" value="{{ $mahasiswa->nim }}" required>
                        @error('nim')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $mahasiswa->email }}" required>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="ttl">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('ttl') is-invalid @enderror" name="ttl" id="ttl" required value="{{ $mahasiswa->ttl }}">
                        @error('ttl')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100" style="border-radius:40px;background-color:purple;border:none">Ubah Profil</button>

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
