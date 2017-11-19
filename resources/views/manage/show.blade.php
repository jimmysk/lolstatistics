@extends('layouts.manage')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-8">
            <div class="pull-right">
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success">Edit User</a>
            </div>
            <legend>View User Details</legend>

            <div class="col">
                <div class="field">
                    <label for="id" class="col-lg-2 control-label">ID</label>
                    <pre>{{$user->id}}</pre>
                </div>
                <div class="field">
                    <label for="name" class="col-lg-2 control-label">Name</label>
                    <pre>{{$user->name}}</pre>
                </div>

                <div class="field">
                    <div class="field">
                        <label for="email" class="col-lg-2 control-label">Email</label>
                        <pre>{{$user->email}}</pre>
                    </div>
                </div>
                <div class="field">
                    <div class="field">
                        <label for="summoner_name" class="col-lg-2 control-label">Summoner</label>
                        <pre>{{$user->summoner_name}}</pre>
                    </div>
                </div>
                <div class="field">
                    <div class="field">
                        <label for="admin" class="col-lg-2 control-label">Authorization</label>
                        <pre>{{$user->admin}}</pre>
                    </div>
                </div>
                <div class="field">
                    <div class="field">
                        <label for="created_at" class="col-lg-2 control-label">User Created:</label>
                        <pre>{{$user->created_at->toFormattedDateString()}}</pre>
                    </div>
                </div>
                <div class="field">
                    <div class="field">
                        <label for="updated_at" class="col-lg-2 control-label">User Updated:</label>
                        <pre>{{$user->updated_at->toFormattedDateString()}}</pre>
                    </div>
                </div>
        </div>
     </div>
 </div>
</div>

@endsection
