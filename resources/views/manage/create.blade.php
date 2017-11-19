@extends('layouts.manage')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <form class="form-horizontal" method="POST" action="{{route('users.store')}}">
                {{csrf_field()}}
              <fieldset>
                <legend>Create New User</legend>
                <div class="form-group">
                  <label for="name" class="col-lg-2 control-label">Name</label>
                  <div class="col-lg-10">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-lg-2 control-label">Email</label>
                  <div class="col-lg-10">
                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="summoner_name" class="col-lg-2 control-label">Summoner</label>
                  <div class="col-lg-10">
                    <input id="summoner_name" type="text" class="form-control" name="summoner_name" value="{{ old('summoner_name') }}" placeholder="Summoner Name (optional)">
                  </div>
                </div>
                <div class="form-group">
                  <label for="password" class="col-lg-2 control-label">Password</label>
                  <div class="col-lg-10">
                    <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                    <label for="password-confirm" class="col-md-2 control-label">Confirm Password</label>
                    <div class="col-md-10">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                    </div>
                </div>

                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button type="reset" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create User</button>
                  </div>
                </div>
              </fieldset>
            </form>
        </div>
    </din>
</div>

@endsection
