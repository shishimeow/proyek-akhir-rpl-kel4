@extends('layouts.adminmain')

@section('container')
    <h1>{{  $title }}</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama User</th>
            <th scope="col">Username</th>
            <th scope="col">Email User</th>
            <th scope="col">Profile Picture</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>
        <tbody>
            @foreach($lists as $list)
                <tr>
                    <td>{{ $num++ }}</td>
                    <td>{{ $list->name }}</td>
                    <td>{{ $list->username }}</td>
                    <td>{{ $list->email }}</td>
                    <td>{{ $list->profile_picture }}</td>
                    <td>
                        <button type="submit" class="btn btn-primary m-1">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
@endsection