<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){



        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://eun1.api.riotgames.com/lol/static-data/v3/champions?locale=en_US&tags=image&dataById=false&api_key=RGAPI-533dab7c-4b3c-4097-879b-466e962a8b8e');

        // Set so curl_exec returns the result instead of outputting it.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Get the response and close the channel.
        $response = curl_exec($ch);
        curl_close($ch);

        $champions = json_decode($response, true);

        

        return view('index', compact('champions'));
    }
}
