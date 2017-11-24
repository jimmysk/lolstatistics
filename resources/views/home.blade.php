@extends('layouts.default')

@section('head_content')
<link href="{{ asset('css/animate.css') }}" rel="stylesheet">
 <style> 
     .jumbotron-bg { 
        
         background-image: url("img/home_img.jpg"); 
         background-repeat: no-repeat; 
         background-color: #222222; 
         background-position: top center;
         background-position-y: -100px;
     } 
</style>
@endsection

@section('content')
<div class="container">
	<div class="jumbotron jumbotron-bg">
		<h1>LoL Bestiary</h1>
	</div>
	
	@if (Auth::user())
    <div class="panel panel-default">
    	<div class="panel-heading">
    		<h4>Recommended Champions</h4>
    	</div>
    	
    	<div class=panel-body>
    		@foreach($recommendedChampions as $champ)
                <div class="img-with-text" style="float: left; width: 120px; margin: 5px">
                    <a href="champion/{!! $champ->Name !!}"><img src="https://ddragon.leagueoflegends.com/cdn/7.10.1/img/champion/{!! $champ->Image !!}" ></img></a>
                    <p>{!! $champ->Name !!}</p>
                </div>
            @endforeach
    	</div>   	
    	
    </div>
    @endif
    
    <div class="panel panel-default">
    	<div class="panel-heading">
    		<h4>News</h4>
    	</div>
    	<div class="panel-body">
    		@foreach($latestNews as $news)
    		<div class="row">
    			<div class="col-md-4">
    				<img class="news-thumbnail" src="{!! $news->Image !!}"></img>
    			</div>
    			<div class="col-md-8">
    				<a href="news/{!! $news->ID !!}"><h5>{!! $news->Title !!}</h5></a>
    				<p>{!! $news->Summary !!}</p>
    			</div>
    		</div>
    		<br></br>
    		@endforeach
    	</div>
    </div>
    
</div>


@endsection

@section('scripts')
<script src="{{ asset('js/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
	@if (session('info'))
		$.notify({
			//options
			message: '{{session('info')}}' 
		},{
			// settings
			type: 'success',
			delay: 3000,
			animate: {
				enter: "animated fadeInRight", 
				exit: "animated fadeOutRight"
			}
			
		});
	@endif
	@if (session('danger'))
		$.notify({
			//options
			message: '{{session('danger')}}' 
		},{
			// settings
			type: 'danger',
			delay: 3000,
			animate: {
				enter: "animated fadeInRight", 
				exit: "animated fadeOutRight"
			}
			
		});
	@endif
});
</script>
@endsection
