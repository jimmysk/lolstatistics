@extends('layouts.manage')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-8">
            <div class="pull-right">
                <a href="{{ route('users.create') }}" class="btn btn-success">Create New User</a>
            </div>
            <legend>Manage Users</legend>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    @if (session('info'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{session('info')}}</strong>
                    </div>
                    @endif
                </div>
            </div>
            <table class="table table-striped table-hover ">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>User</th>
                  <th>Email</th>
                  <th>Join Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @if (count($users) > 0)
                    @foreach($users->all() as $user)
                        <tr>
                          <td>{{ $user->id}}</td>
                          <td>{{ $user->name}}</td>
                          <td>{{ $user->email}}</td>
                          <td>{{ $user->created_at->toFormattedDateString()}}</td>
                          <td>
                              <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-xs">View</a> |
                              <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-xs">Edit</a> |
                              @if ($user->admin == 1)
                                <a href="#" class="btn btn-danger disabled btn-xs">Delete</a>
                              @else
                                <a href="{{ route('users.delete', $user->id) }}" class="btn btn-danger btn-xs">Delete</a>
                              @endif
                          </td>
                        </tr>
                    @endforeach
                  @endif
              </tbody>
          </table>
      </div>
    </div>
    {{$users->links()}}
</div>

@endsection
