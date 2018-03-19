<?php

namespace App\Services;

use App\Repositories\NewsRepository;

class NewsService
{
    private $newsRepository;

    public function __construct(NewsRepository $newsReposository){
        $this->newsRepository = $newsReposository;
    }
    
    public function getLatestNews($size){
        $news = $this->newsRepository->getNews($size);
        return $news;
    }
    
    public function get_news_by_id($id){
        return $this->newsRepository->get_news_by_id($id);
    }
}