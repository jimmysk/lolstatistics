

@extends('layouts.default')
@section('head_content')

@stop

@section('content')

<div class="container">
    <div>
    <h1 class="main-text">{!! $news->Title !!}</h1>
    </div>

    <div class="row">
    	<div class="col-md-4">
    		@if($news->Image != null)
    		<img class="img-thumbnail" src="{{asset($news->Image)}}"></img>
    		@endif
    	</div>
    	<div class="col-md-8">
    		<h3>{!! $news->Summary !!}</h3>
    		<h4>Composed by: {!! $news->Composer !!}</h4>
    		<h5>Date: {!! $news->updated_at!!}</h5>
        <br></br>
        <p style="font-size: 1.3em">
        {!! $news->Description !!}
        </p>
    	</div>
    </div>
</div>


@stop
