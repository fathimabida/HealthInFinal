@extends('Mahasiswa.mahasiswa')


@section('content')
    <div class="py-5">
        <h2 class="mb-5 text-center">Daftar Artikel</h2>

        <div class="row">

            @foreach ($artikel as $item)

            @php
            // Convert the date string to a Unix timestamp
            $timestamp = strtotime($item->created_at);

            // Get the date in the format 'Y-m-d' (Year-Month-Day)
            $date = date('d', $timestamp);

            // Get the abbreviated month name (e.g., "Nov")
            $month = date('F', $timestamp);

            // Get the year
            $year = date('Y', $timestamp);
        @endphp
            <div class="col-lg-3">
                <div class="container-fluid">
                    <div class="card">
                        <img src="{{ asset('storage/' . $item->cover) }}" class="card-img-top" alt="..." width="100%"
                            height="200">
                        <div class="card-body">
                            <span>Healthin </span>
                            <span class="meta-date pl-3">{{ $month }} {{ $date }},
                                        {{ $year }}
                            </span>

                            <h5 class="card-title mt-4 mb-4">{{ $item->judul }}</h5>
                            {{-- <p class="card-text">{!! $item->isi !!}</p> --}}
                            <a href="{{ route('mahasiswa.detail_artikel', $item->id) }}" class="btn btn-primary w-100">
                                Detail
                                Artikel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


        </div>



    </div>
@endsection
