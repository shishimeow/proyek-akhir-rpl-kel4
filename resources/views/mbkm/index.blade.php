@extends('layouts.main')

@section('container')
    <h1>{{ $title }}</h1>

    <div class="row">
        <div class="col-md-6">
          <form action="{{ route('searchm.add') }}">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="dicari ayang" name="search" value="{{ request('search') }}">
              <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
          </form>
        </div>
    </div>

    <div class="main">
        <form action="{{ route('filterm.add') }}" method="POST">
            @csrf
            @foreach ($months as $month)
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="{{ $loop->index + 1 }}" id="{{ $month }}" name="filter[]">
                    <label class="form-check-label" for="{{ $month }}">
                        {{ $month }}
                    </label>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


        @foreach ($mbkms as $mbkm)
        <div class="card" style="width: 18rem;">
            @if($mbkm->picture)
            <img src="{{ asset('storage/'. $mbkm->picture) }}" class="img-preview img-fluid">
            @else
            <img src="{{ URL::to('/') }}/img/image1.jpg" class="card-img-top" alt="Tampilan MBKM">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $mbkm->mbkm_name }}</h5>
                <p class="card-text">Rating: {{ $mbkm->reviewmbkm->avg('rating') }}</p>
                <p class="card-text">Periode pendaftaran: {{ \Carbon\Carbon::parse($mbkm->periode_begin)->locale('id_ID')->isoFormat('D MMMM YYYY') }} - {{ \Carbon\Carbon::parse($mbkm->periode_end)->locale('id_ID')->isoFormat('D MMMM YYYY') }}</p>
                <p class="card-text">{{ $mbkm->excerpt }}</p>
                <a href="/mbkm/{{ $mbkm->slug }}" class="btn btn-primary">Read more</a>
            </div>
        </div>
        @endforeach      
    </div>
@endsection

{{-- ini dateny sbneerny msh blm bgus krna ada di view --}}