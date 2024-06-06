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
                <h3>Sign In</h3>
                {{-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur
                    adipisicing.</p> --}}
            </div>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group first mb-2">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group last mb-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <button class="btn btn-block btn-primary">Log In</button>
                <span class="d-block text-left my-4 text-muted">Belum punya akun? <a href="{{ route('registerPage') }}"
                        class="text-primary">Daftar
                        disini!</a></span>

            </form>
        </div>
    </div>
</div>
@endsection