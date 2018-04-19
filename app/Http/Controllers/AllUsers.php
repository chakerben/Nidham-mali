<?php

namespace App\Http\Controllers;

use App\Client;
use App\Employee;
use App\User;
use Illuminate\Http\Request;

class AllUsers extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index (Request $request) {
        $getUsers     = ($request->method() == "POST" && $request->input('Users'))     || $request->method() == "GET";
        $getEmployees = ($request->method() == "POST" && $request->input('Employees')) || $request->method() == "GET";
        $getClients   = ($request->method() == "POST" && $request->input('Clients'))   || $request->method() == "GET";

        $listUsr = $getUsers ? User::select('id', 'name', 'updated_at')->get() : collect();
        foreach ($listUsr as $usr){
            $usr->root = "users";
            $usr->type = "مستخدم";
        }

        $listEmp = $getEmployees ? Employee::select('id', 'name', 'updated_at')->get() : collect();
        foreach ($listEmp as $emp){
            $emp->root = "employees";
            $emp->type = "مقدم خدمة";
        }

        $listCli = $getClients ? Client::select('id', 'name', 'updated_at')->get() : collect();
        foreach ($listCli as $cli){
            $cli->root = "clients";
            $cli->type = "عميل";
        }
        
        $all = $getUsers && $getEmployees && $getClients;
        $filtres = ["getUsers" => $getUsers, "getEmployees" => $getEmployees, "getClients" => $getClients, "all" => $all];
        $listGlobal = $listCli->concat($listEmp)->concat($listUsr)->sortBy('updated_at');
        return view('Users.index', ["listGlobal" => $listGlobal, "filtres" => $filtres]);
    }
}
