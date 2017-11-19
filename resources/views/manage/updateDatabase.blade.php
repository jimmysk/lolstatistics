@extends('layouts.manage')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-6">
              <fieldset>
                <legend>Update Champions Data</legend>
                @if (session('info'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{session('info')}}</strong>
                </div>
                @endif
                <div class="form-group">
                  <h4>First Make sure that your Api-Key is up to Date. Click <a href="{{route('manage.updateapikey')}}">Here</a> if Not.</h4>
                  <div class="col-lg-10 col-lg-offset-2">
                    <a href="{{ route('manage.updatedata') }}" class="btn btn-danger">Update Database</a>
                  </div>
                </div>
              </fieldset>
        </div>
    </din>
</div>

@endsection
