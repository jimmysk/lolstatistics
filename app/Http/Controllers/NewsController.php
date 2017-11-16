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
    
    public function new(){
        return view('manage.newsForm');
    }
    
    
    public function upload(Request $request)
    {
        
            echo 'Uploaded';
            $file = $request->file;
            $file->move('img', $file->getClientOriginalName());
            $imgPath = 'img/'.$file->getClientOriginalName();
            
            create_news($request->title, $request->summary, $request->description, $imgPath, date("Y-m-d"), 'admin');
            echo '';
        
//         echo 'HELLO';
//         $this->validate($request, [
//             'name' => 'required|max:255',
//             'email' => 'required|string|email|max:255|unique:users',
//             'password' => 'required|string|min:6|confirmed',
//         ]);
        
//         $user = new User();
//         $user->name = $request->name;
//         $user->email = $request->email;
//         $user->password = Hash::make($request->password);
//         $user->admin = 0;
        
//         if ($user->save()){
//             return redirect()->route('users.show', $user->id);
//         } else {
//             return redirect()->route('users.create');
//         }
    }
}
