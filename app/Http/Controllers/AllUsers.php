<?php

namespace App\Http\Controllers;

use App\Client;
use App\Employee;
use App\User;
use Illuminate\Http\Request;

class AllUsers extends Controller
{
    public function index () {
        $listCli = Client::select('id', 'name', 'updated_at')->get();
        foreach ($listCli as $cli){
            $cli->root = "clients";
            $cli->type = "عميل";
        }

        $listEmp = Employee::select('id', 'name', 'updated_at')->get();
        foreach ($listEmp as $emp){
            $emp->root = "employees";
            $emp->type = "مقدم خدمة";
        }
        
        $listUsr = User::select('id', 'name', 'updated_at')->get();
        foreach ($listUsr as $usr){
            $usr->root = "users";
            $usr->type = "مستخدم";
        }
        
        $listGlobal = $listCli->concat($listEmp)->concat($listUsr)->sortBy('updated_at');
        //dd($listGlobal);
        return view('Users.index', ["listGlobal" => $listGlobal]);
    }
}
