
@extends('layouts.default')
@section('head_content')
<style>
body {
    background-image: url("http://ddragon.leagueoflegends.com/cdn/img/champion/splash/{!! $champion['Name'] !!}_0.jpg");
    background-repeat: no-repeat;
    background-color: #222222;
    background-attachment: fixed;
    background-position: top center;
}
</style>
@stop
@section('content')
    
@stop