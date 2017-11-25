<?php

namespace App\Http\Controllers;

include (app_path().'/DatabaseUtils.php');
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){

        $champions = selectChampionImages();

        return view('index', compact('champions'));
    }
}
?>
