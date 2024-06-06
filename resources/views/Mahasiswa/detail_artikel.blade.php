@extends('Mahasiswa.mahasiswa')


@section('content')
    <div class="py-5">
        <h2 class="mb-5 text-center">{{ $artikel->judul }}</h2>

       
        @php
            // Convert the date string to a Unix timestamp
            $timestamp = strtotime($artikel->created_at);

            // Get the date in the format 'Y-m-d' (Year-Month-Day)
            $date = date('d', $timestamp);

            // Get the abbreviated month name (e.g., "Nov")
            $month = date('F', $timestamp);

            // Get the year
            $year = date('Y', $timestamp);
        @endphp
            <div class="col-lg-12">
                <div class="container-fluid">
                    <div class="card" style="border:none">
                        <img src="{{ asset('storage/' . $artikel->cover) }}" class="card-img-top" alt="..." width="100%"
                            height="500">
                        <div class="card-body">
                            <span>Healthin </span>
                            <span class="meta-date pl-3">{{ $month }} {{ $date }},
                                        {{ $year }}
                            </span>

                            
                            <p class="card-text my-5">{!! $artikel->isi !!}</p>
                        </div>
                    </div>
                </div>
            </div>

        


    </div>
@endsection
