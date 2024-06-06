<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        @keyframes slideInFromTop {
            0% {
                transform: translateY(-100%);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .navbar-custom {
            background-color: #fff;
            position: relative;
            animation: slideInFromTop 0.5s ease;
        }

        .navbar-custom .navbar-nav .nav-link {
            color: #333; /* Ubah warna teks */
            transition: color 0.3s ease; /* Animasi warna */
        }

        .navbar-custom .navbar-nav .nav-link:hover {
            color: #007bff; /* Warna teks saat dihover */
        }

        .navbar-custom .dropdown-toggle::after {
            display: inline-block;
            margin-left: 0.5em;
            vertical-align: 0.255em;
            content: "";
            border-top: 0.3em solid;
            border-right: 0.3em solid transparent;
            border-bottom: 0;
            border-left: 0.3em solid transparent;
            transition: transform 0.2s ease; /* Animasi panah */
        }

        .navbar-custom .dropdown-toggle:hover::after {
            transform: rotate(180deg); /* Memutar panah saat dihover */
        }

        .navbar-custom .dropdown-menu {
            border: none;
            border-radius: 0;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); /* Efek bayangan */
            animation: slideInFromTop 0.5s ease; /* Animasi slide-down */
            transform-origin: top; /* Posisi awal animasi */
            opacity: 0;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, opacity 0.3s ease; /* Animasi ketinggian dan opacity */
        }

        .navbar-custom .dropdown-menu.show {
            max-height: 20rem; /* Tinggi maksimum dropdown */
            opacity: 1;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg shadow p-2 navbar-light navbar-custom mx-auto bg-white">
        <a class="navbar-brand" href="{{ route('homepageMahasiswa') }}">
            <img src="https://upload.wikimedia.org/wikipedia/commons/b/bd/Kementerian-kesehatan-ri.svg" width="50"
                height="50" class="d-inline-block align-top" alt="" loading="lazy">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mahasiswa.listDokter') }}">Cari Dokter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mahasiswa.artikel') }}">Artikel</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        Layanan <span class="dropdown-toggle-arrow"></span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('mahasiswa.fasilitas_rs') }}">Fasilitas Rumah Sakit</a>
                        <a class="dropdown-item" href="{{ route('Mahasiswa.InformasiFasilitasPenunjang') }}">Fasilitas Penunjang</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mahasiswa.obat') }}">Obat</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        Informasi <span class="dropdown-toggle-arrow"></span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('mahasiswa.fasilitas_rs') }}">Informasi Fasilitas Kesehatan</a>
                        <a class="dropdown-item" href="{{ route('Mahasiswa.InformasiKegiatan') }}">Informasi Kegiatan</a>
                        <a class="dropdown-item" href="{{ route('Mahasiswa.hasil_mcu') }}">Hasil MCU</a>
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

    <script>
        $(document).ready(function(){
            $('.nav-item.dropdown').on('mouseenter', function(){
                $(this).find('.dropdown-menu').addClass('show');
            }).on('mouseleave', function(){
                $(this).find('.dropdown-menu').removeClass('show');
            });
        });
    </script>
</body>
</html>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('mahasiswa.listDokter') }}">Cari Dokter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('mahasiswa.listDokter') }}">Cari Dokter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('mahasiswa.bmi') }}">Hitung BMI</a>
            </li>
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
                    <a class="dropdown-item" href="{{ route('Mahasiswa.InformasiFasilitasPenunjang') }}">Fasilitas Penunjang</a>
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
                    <a class="dropdown-item" href="{{ route('mahasiswa.fasilitas_rs') }}">Informasi Fasilitas Kesehatan</a>
                        <a class="dropdown-item" href="{{ route('Mahasiswa.InformasiKegiatan') }}">Informasi Kegiatan</a>
                        <a class="dropdown-item" href="{{ route('Mahasiswa.hasil_mcu') }}">Hasil MCU</a>
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
