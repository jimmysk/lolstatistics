<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class ChampionRepository
{
    
    public function selectChampionImages(){
        return DB::table('champions')->select('Name','Image')->orderBy('Name', 'ASC')->get();
    }
    
    public function selectChampionByName($championName){
        return DB::table('champions')->where('Name','=',$championName)->first();
    }
    
    public function selectChampionById($id){
        return DB::table('champions')->where('ID','=',$id)->first();
    }
    
    public function selectRecommendedChampionsByTags($tag1, $tag2){
        return DB::table('infos')->leftJoin('champions', 'infos.Champ_ID', '=', 'champions.ID')->where('champions.Tags' , 'like', '%'.$tag1.'%')->orWhere('champions.Tags' , 'like', '%'.$tag2.'%')->get();
    }
}