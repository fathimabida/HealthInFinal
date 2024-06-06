<nav class="navbar bg-body-tertiary shadow p-2 bg-body-tertiary rounded" style='background-color:#FFFFFF'>
    <div class="container-fluid">
        <a class="navbar-brand px-4" href="/admin" style="color:BLACK; font-size:24px;">HealthIn</a>
        <button class="navbar-toggler " style='background-color:white' type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h3 class="navbar-brand mt-2" style="font-size:28px"><i><span style="color:#1B6065;">Health</span>In</i>
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="icon me-2"><i class="fas fa-user-md"></i></span>
                            List Tenaga Kesehatan
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/listDokterA">Dokter</a></li>
                            <li><a class="dropdown-item" href="/listKonselorA">Konselor</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="icon me-1"><i class="fas fa-clinic-medical"></i></span>
                            Fasilitas Kesehatan</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Fasilitas Utama</a></li>
                            <li><a class="dropdown-item" href="/admin/informasifasilitaspenunjang">Fasilitas Penunjang</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.galeri_kesehatan') }}">Galeri</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="icon me-2"><i class="fas fa-book"></i></span>
                            Informasi</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item"
                                    href="{{ route('admin.informasi_fasliltas_kesehatan') }}">Informasi Faslitas
                                    Kesehatan</a></li>
                            <li><a class="dropdown-item" href="#">Rekomendasi Obat</a></li>
                            <li><a class="dropdown-item" href="/admin/informasikegiatan">Kegiatan Penunjang Kesehatan</a></li>
                            <li><a class="dropdown-item" href="{{ route('listGuideline') }}">Dukungan Kesehatan Mental & Raga</a></li>
                            <li><a class="dropdown-item" href="{{ route('Admin.InformasiKegiatan.index') }}">Informasi Kegiatan</a>
                            <li><a class="dropdown-item" href="{{ route('admin.janji_temu') }}">Informasi Janji Temu</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.artikel') }}"><span class="icon me-2"><i
                                    class="fas fa-newspaper"></i></span>Artikel Kesehatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><span class="icon me-2"><i
                                    class="fas fa-comment-alt"></i></span>Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('helpdeskAdmin') }}"><span class="icon me-2"><i
                                    class="fas fa-headset"></i></span>Helpdesk</a>
                    </li>
                </ul>
            </div>
            <div class="offcanvas-footer d-flex justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link fas fa-sign-out mb-4" style="color:red" href="{{ route('logout') }}">&nbsp;Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </div>
</nav>
