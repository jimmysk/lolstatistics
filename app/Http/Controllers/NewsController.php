<?php
namespace App\Http\Controllers;
include (app_path().'/DatabaseUtils.php');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class NewsController extends Controller
{
    
    public function newsPage($newsId){
    
        $news = get_news_by_id($newsId);
        return view('news', compact('news'));
        
    }
}
