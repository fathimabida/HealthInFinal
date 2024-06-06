<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Memuat CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Halaman Dokter - Healthin</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        .navbar-custom {
            background-color: #8A2BE2;
        }

        .carousel-item img {
            height: 20vh;
            /* Tinggi banner 20% dari tinggi viewport */
            object-fit: cover;
        }

        .card {
            margin-bottom: 20px;
        }

        .footer {

            background-color: #343a40;
            /* Warna background dark */
            color: white;
            padding-top: 40px
        }



        /* Penyesuaian untuk card-deck */
        .custom-card-deck {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .custom-card {
            width: 48%;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .custom-card {
                width: 100%;
            }
        }

        .list-group-item {
            display: flex;
            border-bottom: none;
            align-items: center;
            /* Membuat ikon dan teks sejajar secara vertikal */
        }

        .list-group-item .nav-link {
            color: #313131;
            /* Membuat ikon dan teks sejajar secara vertikal */
        }

        .list-group-item .fas {
            color: purple;
            margin-right: 5px;
            /* Memberikan ruang antara ikon dan teks */
        }
    </style>

    @yield('addStyle')
</head>

<body>


    @include('Employee.navbar')

    @yield('content')


    @include('Employee.footer')
    <!-- Memuat script JS Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



    @yield('addScript')


</body>

</html>
