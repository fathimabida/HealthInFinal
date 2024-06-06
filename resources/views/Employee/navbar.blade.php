<nav class="navbar navbar-expand-lg navbar-light navbar-custom mx-auto bg-white">
    <a class="navbar-brand" href="{{ route('homepageMahasiswa') }}">
        <img src="https://upload.wikimedia.org/wikipedia/commons/b/bd/Kementerian-kesehatan-ri.svg" width="50"
            height="50" class="d-inline-block align-top" alt="" loading="lazy">

    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('mahasiswa.artikel') }}">Artikel</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-expanded="false">
                    Layanan
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('mahasiswa.fasilitas_rs') }}">Fasilitas Rumah Sakit</a>
                    {{-- <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a> --}}
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('mahasiswa.obat') }}">Obat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-expanded="false">
                    Informasi
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('mahasiswa.fasilitas_rs') }}">Informasi Fasilitas
                        Kesehatan</a>
                    {{-- <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a> --}}

                    {{-- <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a> --}}
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('mahasiswa.galeri_kesehatan') }}">Galeri</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Masukan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('helpdesk') }}">Bantuan</a>
            </li>
        </ul>
    </div>
</nav>
