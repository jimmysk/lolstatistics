<?php

namespace App\Http\Controllers;

include (app_path().'/DatabaseUtils.php');
use Illuminate\Http\Request;
use App\Services\ChampionService;

class IndexController extends Controller
{
    public function index(ChampionService $championService){

        $champions = $championService->selectChampionImages();

        return view('index', compact('champions'));
    }
}
?>
