<?php

namespace App\Http\Controllers;

include (app_path().'/DatabaseUtils.php');
include (app_path().'/Euclidean.php');
include (app_path().'/RecommendationFunctions.php');

use App\User;
use App\Services\ChampionService;
use App\Services\NewsService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('admin');
    // }

    /**
     * Show the application dashboard.
     *
     * @`return \Illuminate\Http\Response
     */
    public function home(UserService $userService, ChampionService $championService, NewsService $newsService)
    {
        if (!Auth::guest()){
            $user = Auth::user();
            $recommendedChampions = getRecommendedChampionsForUser($userService, $championService, $user);

            $latestNews = $newsService->getLatestNews(7);
            return view('home', compact('recommendedChampions', 'latestNews'));
        }

        $latestNews = $newsService->getLatestNews(7);
        return view('home', compact('latestNews'));

    }


    public function editData($id)
    {
      $user = User::findOrFail($id);
      return view('editData')->withUser($user);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUserData(Request $request, $id)
    {

        $this->validate($request, [
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users,email,'.$id,
      ]);

      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->email = $request->email;
      $user->summoner_name = $request->summoner_name;

      if ($user->save()){
          return redirect()->route('home');
      } else {
          return redirect()->route('user.editData', $user->id);
      }

    }



}
