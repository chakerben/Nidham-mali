<?php

namespace App\Http\Controllers;

use App\Client;
//use Illuminate\Support\Facades\Input as Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index() { return redirect()->route('allUsers'); }

    public function show($clientId) { return redirect()->route('allUsers'); }

    public function create() {
        if($this->canDo("UsrAc")){
            return view('Users.addClient');
        } else {return redirect()->route('allUsers');}
    }

    public function store(Request $request) {
        if($this->canDo("UsrAc")){
            $name = $request->file('upload')->getClientOriginalName();
            $path = $request->file('upload')->storeAs('files/clients', $name);
        
            $client = Client::create([
                'name' => $request->input('name'),
                'paymentMode' => $request->input('paymentMode'),
                'details' => $request->input('details'),
                'file' => $name
                ]);
        }
        return redirect()->route('allUsers');
    }

    public function edit($clientId) {
        if($this->canDo("UsrUc")){
            $client = Client::findOrFail($clientId);
            return view('Users.addClient', ["client" => $client]);
        } else { return redirect()->route('allUsers'); }
    }

    public function update($clientId, Request $request) {
        if($this->canDo("UsrUc")){
            $client = Client::findOrFail($clientId);

            $name = "";
            if(!is_null($request->file('upload'))){
                $name = $request->file('upload')->getClientOriginalName();
                $path = $request->file('upload')->storeAs('files/clients', $name);
            }

            $client->fill([
                'name' => $request->input('name'),
                'paymentMode' => $request->input('paymentMode'),
                'details' => $request->input('details'),
                'file' => (is_null($name) || empty($name) || strlen($name)) ? $client->file : $name
                ]);
            $client->save();
        }
        return redirect()->route('allUsers');
    }

    public function destroy($clientId) {
        if($this->canDo("UsrDc")){
            $client = Client::findOrFail($clientId);
            $client->delete();
        }
        return redirect()->route('allUsers');
    }

    private function canDo($section){
        $permissions = unserialize(Auth::user()->permissions)["UsrPerms"];
        return $permissions["$section"];
    }
}
