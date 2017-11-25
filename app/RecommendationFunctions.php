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



    $user_prefs = array($recommendationStats->atk, $recommendationStats->def, $recommendationStats->mag, $recommendationStats->dif);
    if ($user->summoner_name != null){
        $summoner = get_summoner_by_name($user->summoner_name);
        $recentMatches = get_matches_by_account_id($summoner['accountId']);
        $matches = $recentMatches['matches'];
        $recent_match_infos = array(0, 0, 0, 0);
        $recent_tags = array(0,0,0,0,0,0);
        foreach($recentMatches['matches'] as $match){
            $recent_info = selectChampionInfos($match['champion']);
            $recent_match_infos[0] += $recent_info->Attack;
            $recent_match_infos[1] += $recent_info->Defense;
            $recent_match_infos[2] += $recent_info->Magic;
            $recent_match_infos[3] += $recent_info->Difficulty;
            $recent_champ = selectChampionById($match['champion']);
            $tag2 = 'Fighter';
            $max = 0;
            if (strpos($recent_champ->Tags, 'Fighter') !== false){
                $recent_tags[0] ++;
                if($recent_tags[0] > $max){
                  $tag2 = 'Fighter';
                  $max = $recent_tags[0];
                }
            }
            if (strpos($recent_champ->Tags, 'Mage') !== false){
                $recent_tags[1] ++;
                if($recent_tags[1] > $max){
                  $tag2 = 'Mage';
                  $max = $recent_tags[1];
                }
            }
            if (strpos($recent_champ->Tags, 'Tank') !== false){
                $recent_tags[2] ++;
                if($recent_tags[2] > $max){
                  $tag2 = 'Tank';
                  $max = $recent_tags[2];
                }
            }
            if (strpos($recent_champ->Tags, 'Assassin') !== false){
                $recent_tags[3] ++;
                if($recent_tags[3] > $max){
                  $tag2 = 'Assassin';
                  $max = $recent_tags[3];
                }
            }
            if (strpos($recent_champ->Tags, 'Marksman') !== false){
                $recent_tags[4] ++;
                if($recent_tags[4] > $max){
                  $tag2 = 'Marksman';
                  $max = $recent_tags[4];
                }
            }
            if (strpos($recent_champ->Tags, 'Support') !== false){
                $recent_tags[5] ++;
                if($recent_tags[5] > $max){
                  $tag2 = 'Support';
                  $max = $recent_tags[5];
                }
            }
        }

        for($i = 0; $i < 4; $i++){
            $recent_match_infos[$i] = $recent_match_infos[$i] / count($recentMatches['matches']);
            $user_prefs[$i] = ($user_prefs[$i] + $recent_match_infos[$i])/2;
        }
    }
    $euclidean = new \Euclidean();
    $dist = array();
    $table = selectRecommendedChampions($tag1, $tag2);

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
    for ($i = 0; $i < 8; $i++){
        $recommendedChampions[$i] = $table[$i];
    }
    return $recommendedChampions;

}
