<?php

function getRecommendedChampionsForUser($user){
    $recommendationStats = get_recommendation_stats_by_id($user->recommendation_stats_id);
    $recommendationTags = get_recommendation_tags_by_id($user->recommendation_tags_id);
    $tag1 = 'Fighter';
    $tag2 = 'Mage';
    $temp1 = $recommendationTags->fighter;
    $temp2 = $recommendationTags->mage;
    if ($recommendationTags->tank > $temp1){
        $tag1 = 'Tank';
        $temp1 = $recommendationTags->tank;
    }
    if ($recommendationTags->tank > $temp2){
        $tag2 = 'Tank';
        $temp2 = $recommendationTags->tank;
    }
    if ($recommendationTags->assassin > $temp1){
        $tag1 = 'Assassin';
        $temp1 = $recommendationTags->assassin;
    }
    if ($recommendationTags->assassin> $temp2){
        $tag2 = 'Assassin';
        $temp2 = $recommendationTags->assassin;
    }
    if ($recommendationTags->marksman > $temp1){
        $tag1 = 'Marksman';
        $temp1 = $recommendationTags->marksman;
    }
    if ($recommendationTags->marksman > $temp2){
        $tag2 = 'Marksman';
        $temp2 = $recommendationTags->marksman;
    }
    if ($recommendationTags->support > $temp1){
        $tag1 = 'Support';
        $temp1 = $recommendationTags->support;
    }
    if ($recommendationTags->support > $temp2){
        $tag2 = 'Support';
        $temp2 = $recommendationTags->support;
    }
    
    $euclidean = new \Euclidean();
    $dist = array();
    $table = selectRecommendedChampions($tag1, $tag2);
    
    $user_prefs = array($recommendationStats->atk, $recommendationStats->def, $recommendationStats->mag, $recommendationStats->dif);
    if ($user->summoner_name != null){
        $summoner = get_summoner_by_name($user->summoner_name);
        $recentMatches = get_matches_by_account_id($summoner['accountId']);
        $matches = $recentMatches['matches'];
        $recent_match_infos = array(0, 0, 0, 0);
        foreach($recentMatches['matches'] as $match){
            $recent_info = selectChampionInfos($match['champion']);
            $recent_match_infos[0] += $recent_info->Attack;
            $recent_match_infos[1] += $recent_info->Defense;
            $recent_match_infos[2] += $recent_info->Magic;
            $recent_match_infos[3] += $recent_info->Difficulty;
        }
        for($i = 0; $i < 4; $i++){
            $recent_match_infos[$i] = $recent_match_infos[$i] / count($recentMatches['matches']);
            $user_prefs[$i] = ($user_prefs[$i] + $recent_match_infos[$i])/2;
        }
    }
    $index = 0;
    foreach ($table as $posibleRecom){
        $posibleRecomStats = array($posibleRecom->Attack, $posibleRecom->Defense, $posibleRecom->Magic, $posibleRecom->Difficulty);
        $dist[$index] = $euclidean->distance($user_prefs, $posibleRecomStats);
        $index++;
    }
    
    do
    {
        $swapped = false;
        for( $i = 0, $c = count( $dist ) - 1; $i < $c; $i++ )
        {
            if( $dist[$i] > $dist[$i + 1] )
            {
                list( $dist[$i + 1], $dist[$i] ) =
                array( $dist[$i], $dist[$i + 1] );
                list( $table[$i + 1], $table[$i] ) =
                array( $table[$i], $table[$i + 1] );
                $swapped = true;
            }
        }
    }
    while( $swapped );
    
    $recommendedChampions = array();
    for ($i = 0; $i < 7; $i++){
        $recommendedChampions[$i] = $table[$i];
    }
    return $recommendedChampions;
    
}