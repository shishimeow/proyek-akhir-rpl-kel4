@extends('layouts.adminmain')

@section('container')
    <h1>{{  $title }}</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Id Fakultas</th>
            <th scope="col">Nama Fakultas</th>
            <th scope="col">Slug</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>
        <tbody>
            @foreach($lists as $list)
                <tr>
                    <td>{{ $num++ }}</td>
                    <td>{{ $list->id }}</td>
                    <td>{{ $list->faculty_name }}</td>
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