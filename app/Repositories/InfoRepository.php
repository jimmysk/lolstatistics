<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class InfoRepository
{
    public function selectChampionInfos($championId){
        return DB::table('infos')->where('Champ_ID','=',$championId)->first();
    }
}