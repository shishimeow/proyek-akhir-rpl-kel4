@extends('layouts.adminmain')

@section('container')
    <h1>{{  $title }}</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama MBKM</th>
            <th scope="col">Waktu Mulai</th>
            <th scope="col">Waktu Akhir</th>
            <th scope="col">Desc Singkat</th>
            <th scope="col">Posisi</th>
            <th scope="col">Benefit</th>
            <th scope="col">Requirements</th>
            <th scope="col">Picture</th>
            <th scope="col">Slug</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>
        <tbody>
          <form action="{{ route('mbkm.create') }}">
            <button type="submit" class="btn btn-primary" name="action">Tambah Course</button>
          </form>
            @foreach($lists as $list)
                <tr>
                    <td>{{ $num++ }}</td>
                    <td>{{ $list->mbkm_name }}</td>
                    <td>{{ $list->periode_begin }}</td>
                    <td>{{ $list->periode_end }}</td>
                    <td>{{ $list->excerpt }}</td>
                    <td>{{ $list->positions }}</td>
                    <td>{{ $list->benefit }}</td>
                    <td>{{ $list->requirements }}</td>
                    <td>{{ $list->picture }}</td>
                    <td>{{ $list->slug }}</td>
                    <td>
                      <a href="{{ route('mbkm.edit', $list->slug)  }}"><button type="submit" class="btn btn-primary m-1">Update</button></a>

                      <form action="{{ route('mbkm.destroy', $list->slug)  }}" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-primary" name="action" value="delete">Delete</button>
                      </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
@endsection