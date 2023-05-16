@extends('layouts.adminmain')

@section('container')
    <h1>{{  $title }}</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Id Course</th>
            <th scope="col">Nama Course</th>
            <th scope="col">Id Fakultas</th>
            <th scope="col">SKS</th>
            <th scope="col">Hari</th>
            <th scope="col">Desc</th>
            <th scope="col">Picture</th>
            <th scope="col">Slug</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>
        <tbody>
          <a href="/admin/sc/create"><button type="submit" class="btn btn-primary m-1">Tambah Course</button></a>
            @foreach($lists as $list)
                <tr>
                    <td>{{ $num++ }}</td>
                    <td>{{ $list->courses_id }}</td>
                    <td>{{ $list->courses_name }}</td>
                    <td>{{ $list->faculty_id }}</td>
                    <td>{{ $list->course_credits }}</td>
                    <td>{{ $list->date }}</td>
                    <td>{{ $list->desc }}</td>
                    <td>{{ $list->picture }}</td>
                    <td>{{ $list->slug }}</td>
                    <td>
                        <a href="/admin/sc/{{ $list->slug }}/edit"><button type="submit" class="btn btn-primary m-1">Update</button></a>

                        <form action="/admin/sc/delete" method="POST">
                          @method('delete')
                          @csrf
                          <input type="hidden" name="rev_id" value="{{ $list->id }}">
                          <button type="submit" class="btn btn-primary" name="action" value="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
@endsection