@extends('Employee.employee')


@section('content')
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="" class="d-block w-100" alt="Slide 1">
        </div>
        <div class="carousel-item">
            <img src="" class="d-block w-100" alt="Slide 2">

        </div>
    </div>
</div>
<div class="container-fluid mt-3">
    <div class="row">
        <!-- Profil Pengguna -->
        <div class="col-3 ml-5">
            <div class="card" style="border-radius:20px;border:none;box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.1)">


                <div class="card-body d-flex flex-column align-items-center position-relative"
                    style="padding-top: 50px;">



                    <div class="background-image"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 140px; background-image: url(https://png.pngtree.com/background/20230525/original/pngtree-image-of-futuristic-medical-hospital-room-picture-image_2736851.jpg); background-size: cover; background-position: center; z-index: 0;border-top-left-radius:20px;border-top-right-radius:20px">
                    </div>

                    <img src="https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2022/05/12062742/4.Pahami-Tahapan-Pendidikan-untuk-Profesi-Perawat.jpg.webp" class="rounded-circle position-absolute"
                        style="width: 120px; height: 120px; left: 50%; transform: translateX(-50%); z-index: 1;margin-top:20px"
                        alt="">

                </div>


                <div class="col-md-12" style="margin-top:120px;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <span class="fas fa-home"></span>
                            <a href="{{ route('homepageMahasiswa') }}" class="nav-link">Home</a>
                        </li>


                        <li class="list-group-item">
                            <span class="fas fa-ambulance"></span>
                            <a href="?page=profil_kesehatan" class="nav-link">Profil Kesehatan Mahasiswa</a>
                        </li>


                        <li class="list-group-item text-center" style="justify-content: center;">
                            <a href="/" class="nav-link">
                                <h6> Logout</h6>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Cardboard -->

        <!-- Kondisi -->
        @if (isset($_GET['page']))
            @if ($_GET['page'] == 'profil_kesehatan')
                @include('Employee.profil_kesehatan')
            @endif
        @else
            <div class="col-md-8">
                <div class="card p-3"
                    style="border-radius:20px;background-color:white;border:none;box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.1);">

                    <div class="card-body">
                        <h5 class="card-title">Anda tidak memiliki janji yang sedang berlangsung</h5>
                        <ul class="list-group" id="list-janji">
                            <!-- List janji akan diisi oleh data yang diperoleh secara dinamis -->
                        </ul>
                        <a href="#" class="btn btn-primary mt-3 px-5"
                            style="border-radius:40px;background-color:purple;border:none">Buat Janji Sekarang</a>
                    </div>
                </div>
            </div>
        @endif



        {{-- <div class="card-deck">

            <div class="card">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>

                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>

            </div>
            <div class="card">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.
                    </p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This card has even longer content than the first to show that equal height
                        action.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div> --}}
        {{-- <div class="container mt-5">
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="https://via.placeholder.com/720" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Caption</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Direct</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
