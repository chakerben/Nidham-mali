<?php

namespace App\Http\Controllers;

use App\Project;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AllProjectsAndServices extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index (Request $request) {
        $allTime = $request->method() == "GET" || ($request->method() == "POST" && $request->input('allTime'));
        $getSrvs = $request->method() == "GET" || ($request->method() == "POST" && $request->input('services'));
        $getPrjs = $request->method() == "GET" || ($request->method() == "POST" && $request->input('projects'));
        $getFini = $request->method() == "GET" || ($request->method() == "POST" && $request->input('finished'));
        $getProg = $request->method() == "GET" || ($request->method() == "POST" && $request->input('inProgres'));
        $getOk   = $request->method() == "GET" || ($request->method() == "POST" && $request->input('projectsOk'));
        $getNok  = $request->method() == "GET" || ($request->method() == "POST" && $request->input('projectsNok'));
        $getNull = $request->method() == "GET" || ($request->method() == "POST" && $request->input('projectsNull'));
        $getAll  = $getPrjs && $getOk && $getNok && $getNull && $getSrvs;
        
        $from = $request->input('from'); $to = $request->input('to'); $today = Carbon::today()->toDateString();

        $listSrv = collect();
        if($getSrvs){
            $srvQ = Service::query()->select('id', 'name', 'finished', 'end_at', 'created_at');
            
            if($getFini && !$getProg)
                $srvQ->having("end_at", "<", $today);
                //$srvQ->having("finished", "=", 1);
            if(!$getFini && $getProg)
                $srvQ->having("end_at", ">=", $today);
                //$srvQ->having("finished", "=", 0);
                
            if(!$allTime)
                $srvQ->whereBetween('created_at', [$from, $to]);
                
            $listSrv = $srvQ->get();
            foreach ($listSrv as $srv){
                $srv->type = "services";
                //dd($srv->end_at.' < '.Carbon::today()->toDateString());
                $srv->finished = ($srv->end_at < $today);
            }
        }
        
        $listPrj = collect();
        if($getPrjs){
            $prjQ = Project::query()->select('id', 'name', 'finished', 'end_at', 'benefis', 'created_at');
            
            if(!$allTime)
                $prjQ->whereBetween('created_at', [$from, $to]);
            
            if($getOk){
                $prjQ->where("benefis", ">", 0);
                if($getNok)
                    $prjQ->orWhere("benefis", "<", 0);
                if($getNull)
                    $prjQ->orWhere("benefis", "=", 0);
            } else if($getNok){
                $prjQ->where("benefis", "<", 0);
                if($getNull)
                    $prjQ->orWhere("benefis", "=", 0);
            } else if($getNull){
                $prjQ->where("benefis", "=", 0);
            }

            if($getFini && !$getProg)
                $prjQ->having("end_at", "<", $today);
                //$prjQ->having("finished", "=", 1);
            if(!$getFini && $getProg)
                $prjQ->having("end_at", ">=", $today);
                //$prjQ->having("finished", "=", 0);

            $listPrj = $prjQ->get();
            foreach ($listPrj as $prj){
                //if($prj->id == 5)
                    //dd($prj);
                $prj->type = "projects";
                $prj->finished = ($prj->end_at < $today);
            }
        }
        
        $fltrs = ["getSrvs" => $getSrvs, "getPrjs" => $getPrjs, "from" => $from, "to" => $to,
            "getOk" => $getOk, "getNok" => $getNok, "getNull" => $getNull, "getFini" => $getFini,
            "getProg" => $getProg, "getAll" => $getAll, "allTime" => $allTime];
        $listGlobal = $listPrj->concat($listSrv)->sortBy('created_at');
        return view('ProjectsAndServices.index', ["listGlobal" => $listGlobal, "fltrs" => $fltrs]);
    }
}
