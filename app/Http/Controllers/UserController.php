<?php

namespace App\Http\Controllers;

use PDF;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input as Input;

class UserController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index() {
        return redirect()->route('allUsers');
    }

    public function show($userId){ return redirect()->route('allUsers'); }

    public function create() {
        if($this->canDo("UsrAu")){
            return view('Users.addUser', ["allPermissions" => $this->allPermissions()]);
        } else { return redirect()->route('allUsers'); }
    }

    public function store(Request $request) {
        if($this->canDo("UsrAu")){
            $photo = "";
            if(!is_null($request->file('photo'))){
                $photo = $request->file('photo')->getClientOriginalName();
                $path = $request->file('photo')->storeAs('files/users', $photo);
            }

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'password' => Hash::make($request->input('password')),
                'description' => $request->input('description'),
                'photo' => $photo,
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

    public function update($userId, Request $request) {
        if($this->canDo("UsrUu")){
            $user = User::findOrFail($userId);

            $photo = "";
            if(!is_null($request->file('photo'))){
                $photo = $request->file('photo')->getClientOriginalName();
                $path = $request->file('photo')->storeAs('files/users', $photo);
            }
            
            $user->fill([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'description' => $request->input('description'),
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

    public function generatePDF($userId) {
        $user = User::findOrFail($userId);
        $pdf = PDF::loadView('users.userPDF', ["user" => $user]);
        return $pdf->download($user->name.'.pdf');
    }

    private function getPermissions($prefix, $perms) {
        $permissions = [];
        foreach($perms as $perm){
            $permissions[$prefix.$perm] = input::get($prefix.$perm) == "on";
        }        
        return $permissions;
    }

    private function allPermissions() {
        $allPerms = [
            "PrjPerms" => $this->getPermissions('Prj', ['A', 'U', 'D', 'S', 'T']),
            "SrvPerms" => $this->getPermissions('Srv', ['A', 'U', 'D', 'S', 'T']),
            "PayPerms" => $this->getPermissions('Pay', ['A', 'U', 'D', 'S', 'Up']),
            "ExpPerms" => $this->getPermissions('Exp', ['A', 'U', 'D', 'S', 'Up']),
            "SetPerms" => $this->getPermissions('Set', ['Ag', 'Ug', 'Aa', 'Ua', 'At', 'Ar']),
            "UsrPerms" => $this->getPermissions('Usr', ['Au', 'Ac', 'Ae', 'Uu', 'Uc', 'Ue', 'Du', 'Dc', 'De'])
        ];
        return $allPerms;
    }

    private function canDo($section) {
        $permissions = unserialize(Auth::user()->permissions)["UsrPerms"];
        return $permissions["$section"];
    }
}
