<?php

namespace App\Http\Controllers;
include (app_path().'/DatabaseUtils.php');

use Illuminate\Http\Request;
class ChampionController extends Controller
{
    
    public function championPage($championName){
        
        $champion = selectChampionByName($championName);
//         $champArray = ($champion);
//         $infos = selectChampionInfos($champArray['id']);
//         $stats = selectChampionStats($champArray['id']);
//         $skins = selectChampionSkins($champArray['id']);
        
        return view('champion', compact('champion'));
        
    }
    
}
