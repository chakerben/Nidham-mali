<?php

namespace App\Http\Controllers;

use App\Project;
use App\Service;
use Illuminate\Http\Request;

class AllProjectsAndServices extends Controller
{
    public function index () {
        $listPrj = Project::select('id', 'name', 'finished', 'updated_at', 'client_id')->get();
        foreach ($listPrj as $prj){
            $prj->type = "projects";
        }
        $listSrv = Service::select('id', 'name', 'finished', 'updated_at')->get();
        foreach ($listSrv as $srv){
            $srv->type = "services";
        }
        $listGlobal = $listPrj->concat($listSrv)->sortBy('updated_at');
        # dd($listGlobal);
        return view('ProjectsAndServices.index', ["listGlobal" => $listGlobal]);
    }
}
