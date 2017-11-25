<?php

namespace App\Http\Controllers;

include (app_path().'/DatabaseUtils.php');
include (app_path().'/Euclidean.php');
include (app_path().'/RecommendationFunctions.php');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Euclidean;
use App\RecommendationTags;
use App\User;
use DB;


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
    public function home()
    {
        if (!Auth::guest()){
            $user = Auth::user();
            $recommendedChampions = getRecommendedChampionsForUser($user);

            $latestNews = get_latest_news();
            return view('home', compact('recommendedChampions', 'latestNews'));
        }

        $latestNews = get_latest_news();
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
