@extends('Mahasiswa.mahasiswa')

@section('addStyle')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap4.css">
@endsection

@section('content')
    <div class="container-fluid py-5">
        <h2 class="mb-5 text-center">Kalkulator Kesehatan</h2>

        <div class="container-fluid">
            <div class="row">



                <div class="col-6 col-lg-4 col-md-8 p-5" style="background-color: purple;border-radius:20px">

                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif


                    <form action="{{ route('mahasiswa.bmi') }}" method="POST">
                        @csrf

                        <div class="form-group mb-2">
                            <label for="" style="color:white">Tinggi (Cm)</label>
                            <input type="number" class="form-control" name="tinggi" id="tinggi" required
                                pattern="^\d+(,\d+)?$">
                        </div>

                        <div class="form-group mb-2">
                            <label for="" style="color:white">Berat Badan (Kg)</label>
                            <input type="number" class="form-control" name="berat_badan" id="berat_badan"
                                pattern="^\d+(,\d+)?$">
                        </div>

                        <div class="form-group mb-2">
                            <label for="" style="color:white">Hasil</label>
                            <input type="number" class="form-control" name="hasil_bmi" required readonly id="hasil_bmi"
                                pattern="^\d+(,\d+)?$">
                        </div>

                        <button type="submit" class="btn btn-info mt-4 w-100">Simpan Hasil BMI</button>

                    </form>


                </div>

                <div class="col-8 col-lg-8 col-md-8">


                    <h2>Hitung BMI Anda</h2>

                    <p>
                        Berat badan ideal adalah impian semua orang. Tidak hanya memiliki bentuk tubuh yang menunjang
                        penampilan, berat badan ideal juga menandakan kondisi tubuh yang sehat. Bagaimana denganmu? Yuk,
                        hitung sekarang di BMI Kalkulator.
                    </p>

                    <p>
                        Menurut WHO, kategori standar berat badan ideal pria dan wanita dewasa berdasarkan BMI adalah
                        sebagai berikut:
                    </p>
                    <p>
                    <ul>
                        <li>
                            Kurang dari 18,5 berarti berat badan kurang (underweight).
                        </li>

                        <li>Antara 18,5 - 24,9 berarti berat badan normal</li>
                        <li>Antara 25-29,9 berarti berat badan berlebih (overweight).</li>
                        <li> Di atas 30 berarti obesitas</li>

                    </ul>
                    </p>



                </div>
            </div>

            <div class="card mt-4 p-4" style="width: 100%;">

                <center>
                    <h4>History Perhitungan BMI</h4>
                </center>

                <div class="card-body">

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Tinggi (Cm)</th>
                                <th>Berat Badan (Kg)</th>
                                <th>Hasil BMI</th>
                                <th>Label</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bmi as $item)
                                @php
                                    $label = '';
                                    if ($item->hasil_bmi < 18.5) {
                                        $label = 'Underweight';
                                    } elseif (18.5 <= $item->hasil_bmi && $item->hasil_bmi <= 24.9) {
                                        $label = 'Normal';
                                    } elseif (25 <= $item->hasil_bmi && $item->hasil_bmi <= 29.9) {
                                        $label = 'Overweight';
                                    } else {
                                        $label = 'Obesitas';
                                    }
                                @endphp

                                <tr>
                                    <td>{{ $item->tinggi }} Cm</td>
                                    <td>{{ $item->berat_badan }} Kg</td>
                                    <td>{{ $item->hasil_bmi }}</td>
                                    <td>{{ $label }}</td>
                                </tr>
                            @endforeach


                        </tbody>

                    </table>
                </div>

            </div>



        </div>




    </div>
@endsection

@section('addScript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap4.js"></script>

    <script>
        new DataTable('#example');
    </script>

    <script>
        $(document).ready(function() {
            $("#tinggi").on('input', function() {
                // alert($(this).val())
                var tinggi = $(this).val() / 100;
                var bb = $('#berat_badan').val();

                var hasil = bb / (tinggi * tinggi);

                // Menggunakan Math.ceil untuk membulatkan ke atas ke dua desimal
                var hasilDibulatkan = Math.ceil(hasil * 100) / 100;

                console.log(hasilDibulatkan.toFixed(2));

                $('#hasil_bmi').val(hasilDibulatkan)


            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#berat_badan").on('input', function() {
                // alert($(this).val())
                var tinggi = $('#tinggi').val() / 100;
                var bb = $(this).val();

                var hasil = bb / (tinggi * tinggi);

                // Menggunakan Math.ceil untuk membulatkan ke atas ke dua desimal
                var hasilDibulatkan = Math.ceil(hasil * 100) / 100;

                console.log(hasilDibulatkan.toFixed(2));

                $('#hasil_bmi').val(hasilDibulatkan)


            });
        });
    </script>
@endsection
