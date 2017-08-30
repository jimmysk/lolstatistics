<?php

namespace App\Http\Controllers;
include (app_path().'/DatabaseUtils.php');

use Illuminate\Http\Request;
class ChampionController extends Controller
{

    public function championPage($championName){

        $champion = selectChampionByName($championName);
        $infos = selectChampionInfos($champion->ID);
        $stats = selectChampionStats($champion->ID);
        $skins = selectChampionSkins($champion->ID);


        return view('champion', compact('champion','infos','stats','skins'));

    }
}
