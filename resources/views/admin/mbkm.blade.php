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
                        <button type="submit" class="btn btn-primary m-1">Update</button>
                        <button type="submit" class="btn btn-primary m-1">Tambah</button>
                        <button type="submit" class="btn btn-primary m-1">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
@endsection