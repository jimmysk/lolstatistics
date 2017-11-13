<?php

namespace App\Http\Controllers;

include (app_path().'/DatabaseUtils.php');
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $recommendedChampions = selectRecommendedChampionImages();
        $latestNews = get_latest_news();
        
        return view('home', compact('recommendedChampions', 'latestNews'));
    }
}
