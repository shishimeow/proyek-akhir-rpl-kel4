@extends('layouts.main')

@section('container')
    @if(session()->has('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row justify-content-center">
        <h1 class="text-center mb-5">{{ $title }}</h1>
        <div class="col-md-5">
            <main class="form-login">
                <form action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                    <label for="login" class="form-label">Email address / Username</label>
                    <input type="text" name="login" class="form-control" id="login" @error('login') is-invalid @enderror value="{{ old('login') }}" required>
                    </div>
                    <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,100}" title="Minimal satu angka, satu huruf kecil, satu huruf kapital, dan sepanjang 8 karakter atau lebih!">
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="true" id="remember_me" name="remember_me">
                        <label class="form-check-label" for="remember_me">
                          Remember me
                        </label>
                    </div>
                    <form action="/login" method="POST">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </form>
                <small class="d-block text-center mt-4">Belum memiliki akun? <a href="/signup">Sign Up</a></small>
            </main>
        </div>
    </div>

@endsection