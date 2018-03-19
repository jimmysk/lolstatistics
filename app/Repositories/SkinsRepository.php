<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class SkinsRepository
{
    public function selectChampionSkins($championId){
        return DB::table('skins')->where('Champ_ID','=',$championId)->get();
    }
}