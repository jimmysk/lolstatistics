@extends('layouts.default')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <form class="form-horizontal" method="POST" action="{{route('user.updateUserData', $user->id)}}">
              <fieldset>
                <legend>Change Account Settings</legend>
                <div class="form-group">
                  <label for="name" class="col-lg-2 control-label">Name</label>
                  <div class="col-lg-10">
                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-lg-2 control-label">Email</label>
                  <div class="col-lg-10">
                    <input id="email" type="text" class="form-control" name="email" value="{{ $user->email }}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="summoner_name" class="col-lg-2 control-label">Summoner</label>
                  <div class="col-lg-10">
                    <input id="summoner_name" type="text" class="form-control" name="summoner_name" value="{{ $user->summoner_name }}" placeholder="Add Summoner (optional)">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                  </div>
                </div>
                <div class="form-group">
               		<input type="hidden" name="_token" value="{{ csrf_token() }}">
               	</div>
              </fieldset>
            </form>
        </div>
    </din>
</div>

@endsection
