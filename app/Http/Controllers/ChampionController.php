<?php

namespace App\Http\Controllers;
include (app_path().'/DatabaseUtils.php');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use App\RecommendationStats;
use App\RecommendationTags;

class ChampionController extends Controller
{

    public function championPage($championName){
        $summoner = null;
        $championMastery = null;

        $champion = selectChampionByName($championName);
        $infos = selectChampionInfos($champion->ID);
        $stats = selectChampionStats($champion->ID);
        $skins = selectChampionSkins($champion->ID);

        if (!Auth::guest()){
            $user = Auth::user();
            if ($user->summoner_name != null){
                $summoner = get_summoner_by_name($user->summoner_name);
                $championMastery = get_champion_mastery_by_summoner($champion->ID, $summoner['id']);
            }

            $recommendationStats = get_recommendation_stats_by_id($user->recommendation_stats_id);
            $recommendationTags = get_recommendation_tags_by_id($user->recommendation_tags_id);
            if (strpos($champion->Tags, 'Fighter') !== false ){
                $recommendationTags->fighter += 1;
            }
            if (strpos($champion->Tags, 'Mage') !== false){
                $recommendationTags->mage += 1;
            }
            if (strpos($champion->Tags, 'Tank')  !== false){
                $recommendationTags->tank += 1;
            }
            if (strpos($champion->Tags, 'Assassin') !== false){
                $recommendationTags->assassin += 1;
            }
            if (strpos($champion->Tags, 'Support') !== false){
                $recommendationTags->support += 1;
            }
            if (strpos($champion->Tags, 'Marksman') !== false){
                $recommendationTags->marksman += 1;
            }
            $recommendationTags->count += 1;
            $recommendationTags->save();

            $first = false;
            if ($recommendationStats->atk == 0 && $recommendationStats->def == 0 && $recommendationStats->mag == 0 && $recommendationStats->dif == 0){
                $first = true;
            }

            $recommendationStats->atk += $infos->Attack;
            $recommendationStats->def += $infos->Defense;
            $recommendationStats->mag += $infos->Magic;
            $recommendationStats->dif += $infos->Difficulty;

            if (!$first){
                $recommendationStats->atk = $recommendationStats->atk / 2;
                $recommendationStats->def = $recommendationStats->def / 2;
                $recommendationStats->mag = $recommendationStats->mag / 2;
                $recommendationStats->dif = $recommendationStats->dif / 2;
            }

            $recommendationStats->count += 1;
            $recommendationStats->save();



        }

        if ($summoner != null){
            return view('champion', compact('champion','infos','stats','skins', 'summoner', 'championMastery'));
        } else{
            return view('champion', compact('champion','infos','stats','skins'));
        }

    }
}
