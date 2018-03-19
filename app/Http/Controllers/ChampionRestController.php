<?php

namespace App\Http\Controllers;

use App\Services\ChampionService;
use Illuminate\Http\Request;

class ChampionRestController extends Controller
{
    
    
    public function selectChampionImages(ChampionService $championService,Request $request){
        return request()->json($championService->selectChampionImages(),201);
    }
    
    public function selectChampionByName(ChampionService $championService, $championName, Request $request){
        return request()->json($this->championRepository->selectChampionByName($championName),201);
    }
    
    public function selectChampionById(ChampionService $championService, $id, Request $request){
        return request()->json($this->championRepository->selectChampionById($id),201);
    }
    
    public function selectChampionInfos(ChampionService $championService, $championId, Request $request){
        return request()->json($this->infoRepository->selectChampionInfos($championId),201);
    }
    
    public function selectChampionStats(ChampionService $championService, $championId, Request $request){
        return request()->json($this->statsRepository->selectChampionStats($championId),201);
    }
    
    public function selectChampionSkins(ChampionService $championService, $championId, Request $request){
        return request()->json($this->skinsRepository->selectChampionSkins($championId),201);
    }
    
    public function selectRecommendedChampionsByTags(ChampionService $championService, $tag1, $tag2, Request $request){
        return request()->json($this->championRepository->selectRecommendedChampionsByTags($tag1, $tag2),201);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
