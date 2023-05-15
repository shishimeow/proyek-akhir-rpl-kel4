@extends('layouts.main')

@section('container')
    @if(session()->has('signError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('signError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <main class="container mt-4 mb-5">
        <h1 class="text-center mb-5">{{ $title }}</h1>
        <form action="/signup" method="POST" class="row justify-content-center g-3">
            @csrf
            <div class="col-12">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" required>
            </div>
            <div class="col-12">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ old('username') }}" required>
            </div>
            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" required>
            </div>
            <div class="col-md-6">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,100}" title="Minimal satu angka, satu huruf kecil, satu huruf kapital, dan sepanjang 8 karakter atau lebih!">
            </div>
            <div class="col-md-6">
              <label for="password" class="form-label">Confirmation Password</label>
              <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="password" name="password_confirmation" required>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Sign Up</button>
            </div>
        </form>
    </main>

@endsection