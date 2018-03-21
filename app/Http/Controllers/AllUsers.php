<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class AllUsers extends Controller
{
    public function index () {
        $listCli = Client::select('id', 'name', 'updated_at')->get();
        foreach ($listCli as $cli){
            $cli->type = "clients";
        }
        
        #$listGlobal = $listPrj->concat($listSrv)->sortBy('updated_at');
        $listGlobal = $listCli;
        # dd($listGlobal);
        return view('Users.index', ["listGlobal" => $listGlobal]);
    }
}
