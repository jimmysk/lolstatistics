<?php

use Illuminate\Support\Facades\DB;

function updateChampionsData(){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://eun1.api.riotgames.com/lol/static-data/v3/champions?locale=en_US&tags=image&tags=info&tags=skins&tags=stats&tags=tags&dataById=false&api_key=RGAPI-af1e6d0d-5ccb-40b9-995f-08174f4dc86d');

    // Set so curl_exec returns the result instead of outputting it.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // Get the response and close the channel.
    $response = curl_exec($ch);
    curl_close($ch);

    $champions = json_decode($response, true);

    $con = new mysqli('127.0.0.1', 'root', '', 'lolbestiary');
    if($con->connect_errno > 0){
        die('Unable to connect to database [' . $con->connect_error . ']');
    }

    foreach ($champions['data'] as $champion) {
        $id = $champion['id'];
        //Champion variables
        $name = $champion['name'];
        if (strpos($name, '\'') == true){
            $name = substr_replace($name, '\\', strpos($name, '\''),0);
        }
        $key = $champion['key'];
        $title = $champion['title'];
        if (strpos($title, '\'') == true){
            $title = substr_replace($title, '\\', strpos($title, '\''),0);
        }
        $image = $champion['image']['full'];
        $tags = $champion['tags'];
        //-------------------------

        //Info variables
        $difficulty = $champion['info']['difficulty'];
        $attack = $champion['info']['attack'];
        $defense = $champion['info']['defense'];
        $magic = $champion['info']['magic'];
        //-------------------------

        //Skins variables
        $skins = $champion['skins'];
        //-------------------------

        //Stats variables
        $armorperlevel = $champion['stats']['armorperlevel'];
        $attackdamage = $champion['stats']['attackdamage'];
        $mpperlevel = $champion['stats']['mpperlevel'];
        $attackspeedoffset = $champion['stats']['attackspeedoffset'];
        $mp = $champion['stats']['mp'];
        $armor = $champion['stats']['armor'];
        $hp = $champion['stats']['hp'];
        $hpregenperlevel = $champion['stats']['hpregenperlevel'];
        $attackspeedperlevel = $champion['stats']['attackspeedperlevel'];
        $attackrange = $champion['stats']['attackrange'];
        $movespeed = $champion['stats']['movespeed'];
        $attackdamageperlevel = $champion['stats']['attackdamageperlevel'];
        $mpregenperlevel = $champion['stats']['mpregenperlevel'];
        $critperlevel = $champion['stats']['critperlevel'];
        $spellblockperlevel = $champion['stats']['spellblockperlevel'];
        $crit = $champion['stats']['crit'];
        $mpregen = $champion['stats']['mpregen'];
        $spellblock = $champion['stats']['spellblock'];
        $hpregen = $champion['stats']['hpregen'];
        $hpperlevel = $champion['stats']['hpperlevel'];
        //------------------------

        $tags_str = implode(",",$tags);

        /*$sql = "INSERT INTO champions(ID, Name, ChampKey, Title, Image, Tags) VALUES('$id','$name','$key','$title','$image','$tags_str')";
        if(!$result = $con->query($sql)){
            die('There was an error running the query [' . $con->error . ']');
        }*/

        $sql = "INSERT INTO infos(Champ_ID, Difficulty, Attack, Defense, Magic) VALUES('$id','$difficulty','$attack','$defense','$magic')";
        if(!$result = $con->query($sql)){
            die('There was an error running the query [' . $con->error . ']');
        }

        foreach($skins as $skin){
            $skin_id = $skin['id'];
            $skin_name = $skin['name'];
            if (strpos($skin_name, '\'') == true){
                $skin_name = substr_replace($skin_name, '\\', strpos($skin_name, '\''),0);
            }
            $skin_num = $skin['num'];
            $sql = "INSERT INTO skins(ID,Name, num, Champ_ID) VALUES('$skin_id','$skin_name','$skin_num','$id')";
            if(!$result = $con->query($sql)){
                die('There was an error running the query [' . $con->error . ']');
            }
        }

        $sql = "INSERT INTO stats(Champ_ID, ArmorPerLevel, AttackDamage, MpPerLevel, AttackSpeedOffset, MP, Armor,
                                    HP, HPRegenPerLevel, AttackSpeedPerLevel, AttackRange, Movespeed, AttackDamagePerLevel,
                                    MPRegenPerLevel, CritPerLevel, SpellBlockPerLevel, Crit, MPRegen, SpellBlock, HPRegen,
                                    HPPerLevel) VALUES('$id','$armorperlevel','$attackdamage','$mpperlevel','$attackspeedoffset','$mp', '$armor', '$hp',
                                    '$hpregenperlevel','$attackspeedperlevel', '$attackrange', '$movespeed', '$attackdamageperlevel', '$mpregenperlevel',
                                    '$critperlevel', '$spellblockperlevel', '$crit', '$mpregen', '$spellblock', '$hpregen', '$hpregenperlevel')";
        if(!$result = $con->query($sql)){
            die('There was an error running the query [' . $con->error . ']');
        }
    }

}

function selectChampionImages(){

    return DB::table('champions')->select('Name','Image')->get();
}

function selectChampionByName($championName){
  
    return DB::table('champions')->where('Name','=',$championName)->first();
}

function selectChampionInfos($championId){

    return DB::table('infos')->where('Champ_ID','=',$championId)->first();
}

function selectChampionStats($championId){

    return DB::table('stats')->where('Champ_ID','=',$championId)->first();
}

function selectChampionSkins($championId){

    return DB::table('skins')->where('Champ_ID','=',$championId)->get();
}

function get_summoner_by_name ($summonerName){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://eun1.api.riotgames.com/lol/summoner/v3/summoners/by-name/'.$summonerName.'?api_key=RGAPI-9ec942ee-ab10-4f35-8958-f657e63f06a1');
    
    // Set so curl_exec returns the result instead of outputting it.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // Get the response and close the channel.
    $response = curl_exec($ch);
    curl_close($ch);
    
    $summoner = json_decode($response, true);
    
    return $summoner;
}

function get_champion_mastery_by_summoner($championId, $summonerId){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://eun1.api.riotgames.com/lol/champion-mastery/v3/champion-masteries/by-summoner/'.$summonerId.'/by-champion/'.$championId.'?api_key=RGAPI-9ec942ee-ab10-4f35-8958-f657e63f06a1');
    
    // Set so curl_exec returns the result instead of outputting it.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // Get the response and close the channel.
    $response = curl_exec($ch);
    curl_close($ch);
    
    $championMastery = json_decode($response, true);
    
    return $championMastery;
}

?>
