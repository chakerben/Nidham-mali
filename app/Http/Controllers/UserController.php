<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index(){
        return redirect()->route('allUsers');
    }

    public function show($userId){ return redirect()->route('allUsers'); }

    public function create(){
        if($this->canDo("UsrAu")){
            return view('Users.addUser', ["allPermissions" => $this->allPermissions()]);
        } else { return redirect()->route('allUsers'); }
    }

    public function store() {
        if($this->canDo("UsrAu")){
            $user = User::create([
                'name' => input::get('name'),
                'email' => input::get('email'),
                'phone' => input::get('phone'),
                'password' => Hash::make(input::get('password')),
                'description' => input::get('description'),
                'photo' => input::get('___'),
                'permissions' => serialize($this->allPermissions())
                ]);
        }
        return redirect()->route('allUsers');
    }

    public function edit($userId) {
        if($this->canDo("UsrUu")){
            $user = User::findOrFail($userId);
            return view('Users.addUser', ["user" => $user]);
        } else { return redirect()->route('allUsers'); }
    }

    public function update($userId) {
        if($this->canDo("UsrUu")){
            $user = User::findOrFail($userId);
            $photo = input::get('___');
            $user->fill([
                'name' => input::get('name'),
                'email' => input::get('email'),
                'phone' => input::get('phone'),
                'description' => input::get('description'),
                'photo' => (is_null($photo) || empty($photo) || strlen($photo)) ? $user->photo : $photo,
                'permissions' => serialize($this->allPermissions())
                ]);
            $user->save();
        }
        return redirect()->route('allUsers');
    }

    public function destroy($userId) {
        if($this->canDo("UsrUu")){
            $user = User::findOrFail($userId);
            $user->delete();
        }
        return redirect()->route('allUsers');
    }

    private function getPermissions($prefix, $perms){
        $permissions = [];
        foreach($perms as $perm){
            $permissions[$prefix.$perm] = input::get($prefix.$perm) == "on";
        }        
        return $permissions;
    }

    private function allPermissions(){
        $allPerms = [
            "PrjPerms" => $this->getPermissions('Prj', ['A', 'U', 'D', 'S', 'T']),
            "SrvPerms" => $this->getPermissions('Srv', ['A', 'U', 'D', 'S', 'T']),
            "PayPerms" => $this->getPermissions('Pay', ['A', 'U', 'D', 'S', 'U1', 'U2']),
            "ExpPerms" => $this->getPermissions('Exp', ['A', 'U', 'D', 'S', 'U1', 'U2']),
            "SetPerms" => $this->getPermissions('Set', ['Ag', 'Ug', 'Aa', 'Ua', 'At', 'Ar']),
            "UsrPerms" => $this->getPermissions('Usr', ['Au', 'Ac', 'Ae', 'Uu', 'Uc', 'Ue', 'Du', 'Dc', 'De'])
        ];
        return $allPerms;
    }

    private function canDo($section){
        $permissions = unserialize(Auth::user()->permissions)["UsrPerms"];
        return $permissions["$section"];
    }
}
