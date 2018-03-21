<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return redirect()->route('allUsers');
    }

    public function show($clientId)
    {
        //$client = Client::findOrFail($clientId);
        //return view('Users.index');
        return redirect()->route('allUsers');
    }

    public function create()
    {
        return view('Users.addClient');
    }

    public function store()
    {
        $client = Client::create([
            'name' => input::get('name'),
            'paymentMode' => input::get('paymentMode'),
            'details' => input::get('details'),
            'file' => input::get('___')
            ]);
            return redirect()->route('allUsers');
    }

    public function edit($clientId)
    {
        $client = Client::findOrFail($clientId);
        return view('Users.addClient', ["client" => $client]);
    }

    public function update($clientId)
    {
        $client = Client::findOrFail($clientId);
        $file = input::get('___');
        $client->fill([
            'name' => input::get('name'),
            'paymentMode' => input::get('paymentMode'),
            'details' => input::get('details'),
            'file' => (is_null($file) || empty($file) || strlen($file)) ? $client->file : $file
            ]);
        $client->save();
        return redirect()->route('allUsers');
    }

    public function destroy($clientId)
    {
        $client = Client::findOrFail($clientId);
        $client->delete();
        return redirect()->route('allUsers');
    }
}
