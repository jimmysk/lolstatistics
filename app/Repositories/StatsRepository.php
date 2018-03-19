<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class StatsRepository
{
    public function selectChampionStats($championId){
        return DB::table('stats')->where('Champ_ID','=',$championId)->first();
    }
}