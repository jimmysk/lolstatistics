<?php
namespace App\Services;

use Illuminate\Support\Facades\Config;


class UserService{

    public function get_summoner_by_name($summonerName){
        $ch = curl_init();
        $riot_api_key = Config::get('constants.riot_api_key');
        curl_setopt($ch, CURLOPT_URL, 'https://eun1.api.riotgames.com/lol/summoner/v3/summoners/by-name/'.$summonerName.'?api_key='.$riot_api_key);
        
        // Set so curl_exec returns the result instead of outputting it.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Get the response and close the channel.
        $response = curl_exec($ch);
        curl_close($ch);
        $summoner = json_decode($response, true);
        
        return $summoner;
    }
    
    function get_matches_by_account_id($accountId){
        $ch = curl_init();
        $riot_api_key = Config::get('constants.riot_api_key');
        curl_setopt($ch, CURLOPT_URL, 'https://eun1.api.riotgames.com/lol/match/v3/matchlists/by-account/'.$accountId.'/recent?api_key='.$riot_api_key);
        
        // Set so curl_exec returns the result instead of outputting it.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Get the response and close the channel.
        $response = curl_exec($ch);
        curl_close($ch);
        
        $recentMatches = json_decode($response, true);
        
        return $recentMatches;
    }
    
    function get_champion_mastery_by_summoner($championId, $summonerId){
        $ch = curl_init();
        $riot_api_key = Config::get('constants.riot_api_key');
        curl_setopt($ch, CURLOPT_URL, 'https://eun1.api.riotgames.com/lol/champion-mastery/v3/champion-masteries/by-summoner/'.$summonerId.'/by-champion/'.$championId.'?api_key='.$riot_api_key);
        
        // Set so curl_exec returns the result instead of outputting it.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Get the response and close the channel.
        $response = curl_exec($ch);
        curl_close($ch);
        
        $championMastery = json_decode($response, true);
        
        return $championMastery;
    }
    
}
