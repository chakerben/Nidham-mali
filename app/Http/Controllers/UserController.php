<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return redirect()->route('allUsers');
    }

    public function show($userId)
    {
        //$user = User::findOrFail($userId);
        //return view('Users.index');
        return redirect()->route('allUsers');
    }

    public function create()
    {
        return view('Users.addUser');
    }

    public function store()
    {
        $user = User::create([
            'name' => input::get('name')
            ]);
            return redirect()->route('allUsers');
    }

    public function edit($userId)
    {
        $user = User::findOrFail($userId);
        return view('Users.addUser', ["user" => $user]);
    }

    public function update($userId)
    {
        $user = User::findOrFail($userId);
        $file = input::get('___');
        $user->fill([
            'name' => input::get('name')
            ]);
        $user->save();
        return redirect()->route('allUsers');
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
        return redirect()->route('allUsers');
    }
}
