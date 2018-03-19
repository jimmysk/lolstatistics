<?php

namespace App\Services;

use App\Repositories\ChampionRepository;
use App\Repositories\InfoRepository;
use App\Repositories\StatsRepository;
use App\Repositories\SkinsRepository;
 
 class ChampionService
 {
     
     private $championRepository;
     private $infoRepository;
     private $statsRepository;
     private $skinsRepository;
     
     public function __construct(ChampionRepository $championReposository, InfoRepository $infoReposository, StatsRepository $statsReposository, SkinsRepository $skinsReposository){
         $this->championRepository = $championReposository;
         $this->infoRepository = $infoReposository;
         $this->statsRepository = $statsReposository;
         $this->skinsRepository = $skinsReposository;
     }
     
     public function selectChampionImages(){
         
         return $this->championRepository->selectChampionImages();
         
     }
     
     public function selectChampionByName($championName){
         return $this->championRepository->selectChampionByName($championName);
     }
     
     public function selectChampionById($id){
         return $this->championRepository->selectChampionById($id);
     }
     
     public function selectChampionInfos($championId){
         return $this->infoRepository->selectChampionInfos($championId);
     }
     
     public function selectChampionStats($championId){
         return $this->statsRepository->selectChampionStats($championId);
     }
     
     public function selectChampionSkins($championId){
         return $this->skinsRepository->selectChampionSkins($championId);
     }
     
     public function selectRecommendedChampionsByTags($tag1, $tag2){
         return $this->championRepository->selectRecommendedChampionsByTags($tag1, $tag2);
     }
     
 }