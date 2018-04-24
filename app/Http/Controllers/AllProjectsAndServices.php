<?php

namespace App\Http\Controllers;

use App\Project;
use App\Service;
use Illuminate\Http\Request;

class AllProjectsAndServices extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index (Request $request) {
        $getAll  = ($request->method() == "POST" && $request->input('checkAll')) || $request->method() == "GET";
        $allTime = ($request->method() == "POST" && $request->input('allTime'))  || $request->method() == "GET";
        $from = $request->input('from'); $to = $request->input('to');

        $listPrj = Project::select('id', 'name', 'finished', 'updated_at', 'client_id')->get();
        foreach ($listPrj as $prj){
            $prj->type = "projects";
        }

        //$listSrv = collect();
        $query = Service::query()->select('id', 'name', 'finished', 'updated_at');
        
        if($request->input('finiched')){
            $query->orWhere("finished", "=", true);
        }
        if($request->input('inProgres')){
            $query->orWhere("finished", "=", false);
        }
        if(!$allTime)
            $query->whereBetween('created_at', [$request->input('from'), $request->input('to')]);

        //$listSrv = Service::select('id', 'name', 'finished', 'updated_at')->get();
        $listSrv = $query->get();
        foreach ($listSrv as $srv){
            $srv->type = "services";
        }

        $listGlobal = $listPrj->concat($listSrv)->sortBy('updated_at');
        return view('ProjectsAndServices.index', ["listGlobal" => $listGlobal, "from" => $from, "to" => $to]);
    }
}
