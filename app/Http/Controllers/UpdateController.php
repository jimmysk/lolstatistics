<?php

namespace App\Http\Controllers;

include (app_path().'/DatabaseUtils.php');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use File;
use DB;

class UpdateController extends Controller
{
    public function show()
    {
      return view('manage.updateApiKey');
    }


    public function change(Request $request)
    {
      if(File::put(config_path() . '/constants.php', "<?php\n return [
          'riot_api_key' =>  '$request->apikey'\n  ];")) {
        return redirect()->route('manage.updateapikey')->with('info', 'Api-Key Updated Successfully!');
      }
      return redirect()->route('manage.updateapikey')->with('error', 'Something goes wrong!!!');
    }


    public function updatedata()
    {
      return view('manage.updateDatabase');
    }


    public function newdata()
    {
      DB::table('champions')->truncate();
      DB::table('infos')->truncate();
      DB::table('skins')->truncate();
      DB::table('stats')->truncate();

      updateChampionsData();

      return redirect()->route('manage.updatedatabase')->with('info', 'Champions Data Updated Successfully!');
    }
}
