@extends('layouts.manage')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <form class="form-horizontal" method="POST" action="{{route('manage.changekey')}}">
                {{csrf_field()}}
              <fieldset>
                <legend>Change Api-Key</legend>
                @if (session('info'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{session('info')}}</strong>
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{session('error')}}</strong>
                </div>
                @endif
                <div class="form-group">
                  <label for="apikey" class="col-lg-2 control-label">Api-Key</label>
                  <div class="col-lg-10">
                    <input id="apikey" type="text" class="form-control" name="apikey" value="{{ old('apikey') }}" placeholder="Insert New Api-Key">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button type="reset" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Api-Key</button>
                  </div>
                </div>
              </fieldset>
            </form>
        </div>
    </din>
</div>

@endsection
