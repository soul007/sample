<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
class UserController extends Controller
{
    public function create()
    {
      return view('users.create');
    }

    public function show($id){
      $user = User::findOrFail($id);
      return view('users.show',compact('user'));
    }

    public function store(Request $request){
      $this->validate($request,[
        'name' =>'required|max:50',
        'email' => 'required|email|unique:users|max:255',
        'password' => 'required'
      ]);

      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'paswword' => bcrypt($request->password)
      ]);
      session()->flash('success','欢迎您将在这里开启一段新的旅程');
      return redirect()->route('users.show',[$user]);
    }
}
