<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserRestController extends Controller
{
    
    public function get_summoner_by_name(UserService $userService, $summonerName, Request $request){
        return request()->json($userService->get_summoner_by_name($summonerName),201);
    }
    
    public function get_matches_by_account_id(UserService $userService, $accountId, Request $request){
        return request()->json($userService->get_matches_by_account_id($accountId),201);
    }
    
    public function get_champion_mastery_by_summoner(UserService $userService, $summonerId, $championId, Request $request){
        return request()->json($userService->get_champion_mastery_by_summoner($championId, $summonerId),201);
    }
    
    public function selectChampionByName(UserService $userService, $championName, Request $request){
        return request()->json($userService->selectChampionByName($championName),201);
    }
    
    public function selectChampionById(UserService $userService, $id, Request $request){
        return request()->json($userService->selectChampionById($id),201);
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
