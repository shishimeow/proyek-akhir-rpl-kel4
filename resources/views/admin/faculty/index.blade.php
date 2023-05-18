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
          <form action="/admin/faculty/create">
            <button type="submit" class="btn btn-primary" name="action">Tambah Fakultas</button>
          </form>
            @foreach($lists as $list)
                <tr>
                    <td>{{ $num++ }}</td>
                    <td>{{ $list->id }}</td>
                    <td>{{ $list->faculty_name }}</td>
                    <td>{{ $list->slug }}</td>
                    <td>
                      <a href="/admin/faculty/{{ $list->slug }}/edit"><button type="submit" class="btn btn-primary m-1">Update</button></a>
      
                      <form action="/admin/faculty/delete" method="POST">
                        @method('delete')
                        @csrf
                        <input type="hidden" name="fac_id" value="{{ $list->id }}">
                        <button type="submit" class="btn btn-primary" name="action" value="delete">Delete</button>
                      </form>
                  </td>
                </tr>
            @endforeach
        </tbody>
      </table>
@endsection