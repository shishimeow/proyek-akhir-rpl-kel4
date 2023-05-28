@extends('layouts.main')

@section('container')
    @if(session()->has('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <h1>{{ $title }}</h1>
    <div class="main">
        <form action="/profile" method="POST" class="row justify-content-center g-3" enctype="multipart/form-data">
            @csrf
            <div class="rounded-image">
                <input type="hidden" name="oldImage" value="{{ auth()->user()->image }}">
                @if(auth()->user()->image)
                <img src="{{ asset('storage/'. auth()->user()->image) }}" alt="Tampilan User" width="200" style="border-radius: 50%; border: 1px solid black;">
                @else
                <img src="{{ URL::to('/') }}/img/user.png" alt="Tampilan User" width="200" style="border-radius: 50%; border: 1px solid black;">
                @endif
                <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
            </div>

            <div class="col-12">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ auth()->user()->name }}" required>
            </div>
            <div class="col-12">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" value="{{ auth()->user()->username }}" required>
            </div>
            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="email" value="{{ auth()->user()->email }}" required>
            </div>
            <div class="col-12">
                <label for="dept" class="form-label">Departemen</label>
                <input type="text" name="dept" class="form-control" id="dept" value="">
              </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>

    @include('layouts.preview')
@endsection