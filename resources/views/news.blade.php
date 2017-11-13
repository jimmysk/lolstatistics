

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
    		<img class="img-thumbnail" src="{{asset($news->Image)}}"></img>
    	</div>
    	<div class="col-md-8">
    		<h3>{!! $news->Summary !!}</h3>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
        	<p>
        	{!! $news->Description !!}
        	</p>
    	</div>
    </div>
</div>


@stop
            