<?php

namespace App\Http\Controllers;

use App\Project;
use App\Client;
use App\Tranche;
use Illuminate\Support\Facades\Input as Input;
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

    public function store(Request $request)
    {
        //$path = $request->file('avatar')->store('avatars');
        //dd($path);
        if($this->canDo("PrjA")){
            $project = Project::create([
                'name' => input::get('name'),
                'begin_at' => input::get('begin_at'),
                'end_at' => input::get('end_at'),
                'details' => input::get('details'),
                'client_id' => input::get('client_id'),
                'cost' => input::get('cost'),
                'remarques' => input::get('remarques'),
                'file' => input::get('___')
                ]);

            $trNum = input::get('payment-num');
            for($i=1; $i<=$trNum; $i++)
            {
                $tranche = Tranche::create([
                    'amount' => input::get('tranche_'.$i.'_amount'),
                    'date_tranche' => input::get('tranche_'.$i.'_date'),
                    'project_id' => $project->id
                ]);
            }
        }
        return redirect()->route('allProjectsAndServices');
    }

    public function edit($projectId)
    {
        if($this->canDo("PrjU")){
            $clients = Client::select('id', 'name')->get();
            $project = Project::findOrFail($projectId);
            return view('ProjectsAndServices.addProject', ["clients" => $clients, "project" => $project]);
        } else {
            return redirect()->route('allProjectsAndServices');
        }
    }

    public function update($projectId)
    {
        if($this->canDo("PrjU")){
            $project = Project::findOrFail($projectId);
            $file = input::get('___');
            $project->fill([
                'name' => input::get('name'),
                'begin_at' => input::get('begin_at'),
                'end_at' => input::get('end_at'),
                'details' => input::get('details'),
                'client_id' => input::get('client_id'),
                'cost' => input::get('cost'),
                'remarques' => input::get('remarques'),
                'file' => (is_null($file) || empty($file) || strlen($file)) ? $project->file : $file
                ]);
            $project->save();

            $count = $project->Tranches()->count();
            $prjTranches = $project->Tranches()->get();
            $trNum = input::get('payment-num');

            if($trNum <= $count){
                $project->Tranches()->delete();
                for($i=1; $i<=$trNum; $i++){
                    $tranche = Tranche::create([
                        'amount' => input::get('tranche_'.$i.'_amount'),
                        'date_tranche' => input::get('tranche_'.$i.'_date'),
                        'project_id' => $project->id
                    ]);
                }
            } else {
                for($i=1; $i<=$count; $i++){
                    $tranche = $prjTranches[$i-1];
                    $tranche->fill([
                        'amount' => input::get('tranche_'.$i.'_amount'),
                        'date_tranche' => input::get('tranche_'.$i.'_date'),
                        'project_id' => $project->id
                    ]);
                    $tranche->save();
                }
                for($i=$count+1; $i<=$trNum; $i++){
                    $tranche = Tranche::create([
                        'amount' => input::get('tranche_'.$i.'_amount'),
                        'date_tranche' => input::get('tranche_'.$i.'_date'),
                        'project_id' => $project->id
                    ]);
                }
            }
        }
        return redirect()->route('allProjectsAndServices');
    }

    public function destroy($projectId)
    {
        if($this->canDo("PrjD")){
            $project = Project::findOrFail($projectId);
            $project->delete();
        }
        return redirect()->route('allProjectsAndServices');
    }

    public function jsonProjectTranches($projectId){
        $project = Project::findOrFail($projectId);
        return $project->Tranches()->select('id', 'amount')->get()->toJson();
    }

    private function canDo($section){
        $permissions = unserialize(Auth::user()->permissions)["PrjPerms"];
        return $permissions["$section"];
    }
}
