
@extends('layouts.default')
@section('head_content')
<style>
body {
    background-image: url("http://ddragon.leagueoflegends.com/cdn/img/champion/splash/{!! $champion->ChampKey !!}_0.jpg");
    background-repeat: no-repeat;
    background-color: #222222;
    background-attachment: fixed;
    background-position: top center;
}
.main-text{
    color:#d39d30;
    margin-top: 5px;
}
</style>
@stop

@section('content')

<div>
    <h1 class="main-text">{!! $champion->Name !!}</h1>
    <h3 class="main-text">{!! $champion->Title !!}</h3>
    <h4 class="main-text">{!! $champion->Tags !!}</h4>
</div>

<!-- champion infos panel -->
<div class="row">
	<div class="col-md-4">
    	<div class="panel panel-default">
    		<div class="panel-heading">
    			<h4>Champion Infos</h4>		
    		</div>
    		<div class="panel-body">
    			<h5>Attack</h5>
                <div class="progress">
                    <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="{!! $infos->Attack !!}"
                    aria-valuemin="0" aria-valuemax="10" style="width:{!! $infos->Attack * 10 !!}%">{!! $infos->Attack !!}
                    </div>
                </div>
                <h5>Defense</h5>
                <div class="progress">
                    <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="{!! $infos->Defense !!}"
                    aria-valuemin="0" aria-valuemax="10" style="width:{!! $infos->Defense * 10 !!}%">{!! $infos->Defense !!}
                    </div>
                </div>
                <h5>Magic</h5>
                <div class="progress">
                    <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="{!! $infos->Magic !!}"
                    aria-valuemin="0" aria-valuemax="10" style="width:{!! $infos->Magic * 10 !!}%">{!! $infos->Magic !!}
                    </div>
                </div>
                <h5>Difficulty</h5>
                <div class="progress">
                    <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="{!! $infos->Difficulty !!}"
                    aria-valuemin="0" aria-valuemax="10" style="width:{!! $infos->Difficulty * 10 !!}%">{!! $infos->Difficulty !!}
                    </div>
                </div>
        	</div>
		</div>
	</div>
	@if (Auth::user() && !array_key_exists('status', $championMastery))
	<div class="col-md-2 pull-right">
		<div class="panel panel-default">
			<div class="panel-heading" style="text-align: center">
				<h5>Mastery</h5>
			</div>
			<div class="panel-body" style="text-align: center">
				<div class="row">
					<div class="col-md-12">
        	    		<img src="{{ asset('img/master'.$championMastery['championLevel'].'.png') }}" ></img>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 ">
        	    		@if ($championMastery['chestGranted'] )
        	    			<img src="{{ asset('img/chest.png') }}" ></img>
        	    		@else
        	    			<img src="{{ asset('img/chest.png') }}" class="disabled"></img>
        	    		@endif
					</div>
				</div>
			</div>
		</div>
	</div>
	@endif
</div>
<!-- ./champion infos panel -->

<!-- champion stats panel -->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Stats</h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-3">
						<ul class="list-group">
							<li class="list-group-item" style="background:darkred;">Attack Stats</li>
							<li class="list-group-item">Attack Damage: {!! $stats->AttackDamage !!}</li>
							<li class="list-group-item">Attack Damage/Level: {!! $stats->AttackDamagePerLevel !!}</li>
							<li class="list-group-item">Attack Speed Offset: {!! $stats->AttackSpeedOffset !!}</li>
							<li class="list-group-item">Attack Speed/Level: {!! $stats->AttackSpeedPerLevel !!}</li>
							<li class="list-group-item">Attack Range: {!! $stats->AttackRange !!}</li>
						</ul>
					</div>
					<div class="col-md-3">
						<ul class="list-group">
							<li class="list-group-item" style="background:darkgreen;">Defense Stats</li>
							<li class="list-group-item">HP: {!! $stats->HP !!}</li>
							<li class="list-group-item">HP/Level: {!! $stats->HPPerLevel !!}</li>
							<li class="list-group-item">HP Regen: {!! $stats->HPRegen !!}</li>
							<li class="list-group-item">HP Regen/Level: {!! $stats->HPRegenPerLevel !!}</li>
							<li class="list-group-item">Armor: {!! $stats->Armor !!}</li>
							<li class="list-group-item">Armor/Level: {!! $stats->ArmorPerLevel !!}</li>
							<li class="list-group-item">Spellblock: {!! $stats->SpellBlockPerLevel !!}</li>
							<li class="list-group-item">Spellblock/Level: {!! $stats->SpellBlockPerLevel !!}</li>
						</ul>
					</div>
					<div class="col-md-3">
						<ul class="list-group">
							<li class="list-group-item" style="background:darkblue;">Magic Stats</li>
							<li class="list-group-item">MP: {!! $stats->MP !!}</li>
							<li class="list-group-item">MP/Level: {!! $stats->MpPerLevel !!}</li>
							<li class="list-group-item">MP Regen: {!! $stats->MPRegen !!}</li>
							<li class="list-group-item">MP Regen/Level: {!! $stats->MPRegenPerLevel !!}</li>
						</ul>
					</div>
					<div class="col-md-3">
						<ul class="list-group">
							<li class="list-group-item" style="background:orangered;">General Stats</li>
							<li class="list-group-item">Movespeed: {!! $stats->Movespeed !!}</li>
							<li class="list-group-item">Critical: {!! $stats->Crit !!}</li>
							<li class="list-group-item">Critical/Level: {!! $stats->CritPerLevel !!}</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- ./champion stats panel -->


<!-- skins panel -->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Skins</h4>
			</div>
			<div class="panel-body">
				@foreach($skins as $skin)
				<a data-name="{!! $skin->Name !!}" data-num="{!! $skin->num !!}" data-toggle="modal" href="#skins-modal"><img height="280" width="156" src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/{!! $champion->ChampKey !!}_{!! $skin->num !!}.jpg"></img></a>
				@endforeach
			</div>
		</div>
	</div>
</div>
<!-- ./skins panel -->

<!-- Skins Modal -->
<div id="skins-modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <img width="100%" height="100%" src=""></img>
      </div>
    </div>
  </div>
</div>
<!-- ./Skins Modal -->

<script>
$('#skins-modal').on('show.bs.modal', function (event) {
	  var skin = $(event.relatedTarget) // Button that triggered the modal
	  var skinName = skin.data("name");
	  var skinNum = skin.data("num");
	  console.log(skinName);
	  console.log(skinNum);
	  
	  var modal = $(this);
	  modal.find('.modal-title').text(skinName);
	  modal.find('.modal-body img').attr("src", "http://ddragon.leagueoflegends.com/cdn/img/champion/splash/{!! $champion->ChampKey !!}_" + skinNum + ".jpg")
	})
</script>

@stop
