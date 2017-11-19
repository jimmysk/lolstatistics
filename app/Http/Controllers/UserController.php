<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::all();
        $users = User::orderBy('id','desc')->paginate(10);
        return view('manage.table')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
      ]);

      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->summoner_name = $request->summoner_name;
      $user->password = Hash::make($request->password);
      $user->admin = 0;

      if ($user->save()){
          return redirect()->route('users.show', $user->id);
      } else {
          return redirect()->route('users.create');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view("manage.show")->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view("manage.edit")->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users,email,'.$id,
        'admin' => 'required|boolean'
      ]);

      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->email = $request->email;
      $user->summoner_name = $request->summoner_name;
      $user->admin = $request->admin;

      if ($user->save()){
          return redirect()->route('users.show', $user->id);
      } else {
          return redirect()->route('users.edit', $user->id);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect('/manage/users')->with('info', 'User Deleted Successfully!');
    }
}
