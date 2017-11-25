<?php
namespace App\Http\Controllers;
include (app_path().'/DatabaseUtils.php');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\News;

class NewsController extends Controller
{

    public function index()
    {
        //$users = User::all();
        $news = News::orderBy('id','desc')->paginate(10);
        return view('manage.newsTable')->withNews($news);
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view("manage.editNews")->withNews($news);
    }


    public function show($newsId){

        $news = get_news_by_id($newsId);
        return view('news', compact('news'));

    }

    public function new(){
        return view('manage.newsForm');
    }



    public function insert(Request $request)
    {

            $news = new News;
            $file = $request->file;
            $news->Title = $request->title;
//             $news->Composer = $request->composer;
            $news->Composer = Auth::user()->name;
            $news->Summary = $request->summary;
            $news->Description = $request->description;

            if ($request->file != null){
                $file->move('img', $file->getClientOriginalName());
                $imgPath = 'img/'.$file->getClientOriginalName();

                $news->Image = $imgPath;
            }
            $news->save();
            return redirect('/manage/news')->with('info', 'News Added!');

    }

    public function update(Request $request, $id)
    {


        $news = News::findOrFail($id);

        $news->Title = $request->title;
        //             $news->Composer = $request->composer;
        $news->Composer = Auth::user()->name;
        $news->Summary = $request->summary;
        $news->Description = $request->description;

        if ($request->file != null){
            $file = $request->file;
            $file->move('img', $file->getClientOriginalName());
            $imgPath = 'img/'.$file->getClientOriginalName();
            $news->Image = $imgPath;
        }



        if ($news->save()){
            return redirect()->route('news.show', $news->id);
        } else {
            return redirect()->route('news.edit', $news->id);
        }
    }

    public function destroy($id)
    {
        News::where('id', $id)->delete();
        return redirect('/manage/news')->with('info', 'News Deleted Successfully!');
    }
}
