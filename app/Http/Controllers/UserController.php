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
        return redirect()->route('allUsers');
    }

    public function create()
    {
        return view('Users.addUser');
    }

    public function store()
    {
        $user = User::create([
            'name' => input::get('name'),
            'email' => input::get('email'),
            'phone' => input::get('phone'),
            'password' => input::get('password'),
            'description' => input::get('description'),
            'photo' => input::get('___')
            ]);
            //dd($user);
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
        $photo = input::get('___');
        $user->fill([
            'name' => input::get('name'),
            'email' => input::get('email'),
            'phone' => input::get('phone'),
            'description' => input::get('description'),
            'photo' => (is_null($photo) || empty($photo) || strlen($photo)) ? $user->photo : $photo
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
