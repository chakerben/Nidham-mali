<?php

namespace App\Http\Controllers;

use App\Project;
use App\Client;
use App\Tranche;
//use Illuminate\Support\Facades\Input as Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index() { return view('ProjectsAndServices.index'); }

    public function show($projectId) {
        if($this->canDo("PrjS")){
            $project = Project::findOrFail($projectId);
            
            $project->payd = 0;
            foreach($project->tranches as $tranche){
                foreach($tranche->payments as $payment){
                    $project->payd += $payment->amount;
                }
            }
            $project->dept = 0;

            return view('ProjectsAndServices.projectDetails', ["project" => $project]);
        } else {
            return redirect()->route('allProjectsAndServices');
        }
    }

    public function create() {
        if($this->canDo("PrjA")){
            $clients = Client::select('id', 'name')->get();
            return view('ProjectsAndServices.addProject', ["clients" => $clients]);
        } else {
            return redirect()->route('allProjectsAndServices');
        }
    }

    public function store(Request $request) {
        if($this->canDo("PrjA")){
            $name = $request->file('upload')->getClientOriginalName();
            $path = $request->file('upload')->storeAs('files/projects', $name);
        
            $project = Project::create([
                'name' => $request->input('name'),
                'begin_at' => $request->input('begin_at'),
                'end_at' => $request->input('end_at'),
                'details' => $request->input('details'),
                'client_id' => $request->input('client_id'),
                'cost' => $request->input('cost'),
                'remarques' => $request->input('remarques'),
                'file' => $name
                ]);

            $trNum = $request->input('payment-num');
            for($i=1; $i<=$trNum; $i++)
            {
                $tranche = Tranche::create([
                    'amount' => $request->input('tranche_'.$i.'_amount'),
                    'date_tranche' => $request->input('tranche_'.$i.'_date'),
                    'project_id' => $project->id
                ]);
            }
        }
        return redirect()->route('allProjectsAndServices');
    }

    public function edit($projectId) {
        if($this->canDo("PrjU")){
            $clients = Client::select('id', 'name')->get();
            $project = Project::findOrFail($projectId);
            return view('ProjectsAndServices.addProject', ["clients" => $clients, "project" => $project]);
        } else {
            return redirect()->route('allProjectsAndServices');
        }
    }

    public function update($projectId, Request $request) {
        if($this->canDo("PrjU")){
            $project = Project::findOrFail($projectId);

            $name = "";
            if(!is_null($request->file('upload'))){
                $name = $request->file('upload')->getClientOriginalName();
                $path = $request->file('upload')->storeAs('files/projects', $name);
            }

            $project->fill([
                'name' => $request->input('name'),
                'begin_at' => $request->input('begin_at'),
                'end_at' => $request->input('end_at'),
                'details' => $request->input('details'),
                'client_id' => $request->input('client_id'),
                'cost' => $request->input('cost'),
                'remarques' => $request->input('remarques'),
                'file' => (is_null($name) || empty($name) || !strlen($name)) ? $project->file : $name
                ]);
            $project->save();

            $count = $project->Tranches()->count();
            $prjTranches = $project->Tranches()->get();
            $trNum = $request->input('payment-num');

            if($trNum <= $count){
                $project->Tranches()->delete();
                for($i=1; $i<=$trNum; $i++){
                    $tranche = Tranche::create([
                        'amount' => $request->input('tranche_'.$i.'_amount'),
                        'date_tranche' => $request->input('tranche_'.$i.'_date'),
                        'project_id' => $project->id
                    ]);
                }
            } else {
                for($i=1; $i<=$count; $i++){
                    $tranche = $prjTranches[$i-1];
                    $tranche->fill([
                        'amount' => $request->input('tranche_'.$i.'_amount'),
                        'date_tranche' => $request->input('tranche_'.$i.'_date'),
                        'project_id' => $project->id
                    ]);
                    $tranche->save();
                }
                for($i=$count+1; $i<=$trNum; $i++){
                    $tranche = Tranche::create([
                        'amount' => $request->input('tranche_'.$i.'_amount'),
                        'date_tranche' => $request->input('tranche_'.$i.'_date'),
                        'project_id' => $project->id
                    ]);
                }
            }
        }
        return redirect()->route('allProjectsAndServices');
    }

    public function destroy($projectId) {
        if($this->canDo("PrjD")){
            $project = Project::findOrFail($projectId);
            $project->delete();
        }
        return redirect()->route('allProjectsAndServices');
    }

    public function jsonProjectTranches($projectId) {
        $project = Project::findOrFail($projectId);
        return $project->Tranches()->select('id', 'amount')->get()->toJson();
    }

    private function canDo($section) {
        $permissions = unserialize(Auth::user()->permissions)["PrjPerms"];
        return $permissions["$section"];
    }
}
