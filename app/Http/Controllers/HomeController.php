<?php

namespace App\Http\Controllers;

include (app_path().'/DatabaseUtils.php');
include (app_path().'/Euclidean.php');
include (app_path().'/RecommendationFunctions.php');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Euclidean;
use App\RecommendationTags;


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
     * @`return \Illuminate\Http\Response
     */
    public function home()
    {
        if (!Auth::guest()){
            $user = Auth::user();
            $recommendedChampions = getRecommendedChampionsForUser($user);
            
            $latestNews = get_latest_news();
            return view('home', compact('recommendedChampions', 'latestNews'));
//             return view('home', compact('latestNews'));
        }
        
        $latestNews = get_latest_news();
        return view('home', compact('latestNews'));
        
    }
    
    
    
}
