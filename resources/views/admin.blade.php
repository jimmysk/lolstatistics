@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ADMIN Dashboard</div>

                <div class="panel-body">
                    You are logged in as <strong>ADMIN</strong>!
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
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
                              <a href='{{ url("/admin/delete/{$user->id}")}}' class="label label-danger">Delete</a>
                          </td>
                        </tr>
                    @endforeach
                  @endif
              </tbody>
          </table>
    </div>
</div>
@endsection
