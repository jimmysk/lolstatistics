<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    public function contact(){
        return view('contactForm');
    }

    public function send(Request $request){

    $validator = Validator::make($request->all(), [
          'name' => 'required|max:255',
          'surname' => 'required|max:255',
          'email' => 'required|string|email|max:255',
          'phone' => 'required|string|max:14',
          'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return  redirect('/home')->with('danger', 'Error while sending message');
        }

        $title = "Message from ".$request->name." ".$request->surname;
        $name = $request->name;
        $surname = $request->surname;
        $email = $request->email;
        $phone = $request->phone;
        $content = $request->message;

        Mail::send('emails.send', ['title' => $title, 'name' => $name, 'surname' => $surname, 'email' => $email, 'phone' => $phone, 'content' => $content], function ($message) use ($request)
        {

            $message->from($request->email, $request->name." ".$request->surname);

            $message->to('nvvalanos@gmail.com');

        });

        if (response()->json(['message' => 'Request completed'])){
            return  redirect('/home')->with('info', 'Message has been sent!');
        }
        else{
            return  redirect('/home')->with('danger', 'Error while sending message');
        }
    }

}
