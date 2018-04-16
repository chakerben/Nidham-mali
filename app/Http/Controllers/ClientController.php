<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Support\Facades\Input as Input;
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

    public function store() {
        if($this->canDo("UsrAc")){
            $client = Client::create([
                'name' => input::get('name'),
                'paymentMode' => input::get('paymentMode'),
                'details' => input::get('details'),
                'file' => input::get('___')
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

    public function update($clientId) {
        if($this->canDo("UsrUc")){
            $client = Client::findOrFail($clientId);
            $file = input::get('___');
            $client->fill([
                'name' => input::get('name'),
                'paymentMode' => input::get('paymentMode'),
                'details' => input::get('details'),
                'file' => (is_null($file) || empty($file) || strlen($file)) ? $client->file : $file
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
