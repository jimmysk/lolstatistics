
@extends('layouts.default')
@section('content')
    @foreach($champions['data'] as $champ)
            <a href="champion/{!! $champ['name'] !!}"><img src="https://ddragon.leagueoflegends.com/cdn/7.10.1/img/champion/{!! $champ['image']['full'] !!}" ></img></a>
    @endforeach
    <button type="submit" class="btn" onclick="UserAction()">Search</button>
@stop
