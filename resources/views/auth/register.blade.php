@extends('auth.template')

@section('content')


    <div class="col-md-6 contents">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-4">
                    <h3>Registration</h3>
                    {{-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur
                    adipisicing.</p> --}}
                </div>

                <form action="{{ route('registration') }}" method="POST">
                    @csrf

                    <div class="form-group first mb-2">
                        <label for="name">Name</label>
                        <input type="name" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" value="{{ old('nama') }}" autocomplete="nama" autofocus required>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group first mb-2">
                        <label for="name">NIM</label>
                        <input type="name" class="form-control @error('name') is-invalid @enderror" id="nim"
                            name="nim" value="{{ old('nim') }}" autocomplete="nim" autofocus required>

                        @error('nim')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group first mb-2">
                        <label for="name">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('ttl') is-invalid @enderror" id="ttl"
                            name="ttl" value="{{ old('ttl') }}" autocomplete="ttl" autofocus required>

                        @error('ttl')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" required value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password" required autocomplete="new-password">
                    </div>


                    <div class="form-group mb-4">
                        <label for="password-confirm">Confirm Password</label>
                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>

                    <button class="btn btn-block btn-primary">Regist</button>
                    <span class="d-block text-left my-4 text-muted">Sudah punya akun? <a href="{{ route('loginPage') }}"
                            class="text-primary">Masuk</a></span>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
