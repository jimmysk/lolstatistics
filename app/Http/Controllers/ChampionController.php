<?php

namespace App\Http\Controllers;
include (app_path().'/DatabaseUtils.php');

use Illuminate\Http\Request;
class ChampionController extends Controller
{

    public function championPage($championName){

        $summonerName = 'MaverickZero';
        $summoner = get_summoner_by_name($summonerName);

        $champion = selectChampionByName($championName);
        $infos = selectChampionInfos($champion->ID);
        $stats = selectChampionStats($champion->ID);
        $skins = selectChampionSkins($champion->ID);

        $championMastery = get_champion_mastery_by_summoner($champion->ID, $summoner['id']);
        return view('champion', compact('champion','infos','stats','skins', 'summoner', 'championMastery'));

    }
}
