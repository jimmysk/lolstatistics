<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class NewsRepository
{
    public function getNews($size){
        return DB::table('news')->select('ID', 'Image', 'Title', 'Summary')->limit($size)->get();
    }
    
    public function get_news_by_id($id){
        return DB::table('news')->where('ID','=',$id)->first();
    }
}