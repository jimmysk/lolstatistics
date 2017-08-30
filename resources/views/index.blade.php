
@extends('layouts.default')
@section('content')
    @foreach($champions as $champ)
        <div class="img-with-text" style="float: left; width: 120px;">
            <a href="champion/{!! $champ->Name !!}"><img src="https://ddragon.leagueoflegends.com/cdn/7.10.1/img/champion/{!! $champ->Image !!}" ></img></a>
            <p>{!! $champ->Name !!}</p>
        </div>
    @endforeach
    <br style="clear: left;" />
    <div class="row">
        <div class="col-md-12">
            <div style="text-align: center;">
                <button type="submit" class="btn"  onclick="UserAction()">Search</button>
            </div>
        </div>
    </div>
@stop
