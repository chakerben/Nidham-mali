<?php

namespace App\Http\Controllers;

use App\Project;
use App\Client;
use App\Tranche;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        return view('ProjectsAndServices.index');
    }

    public function show($projectId)
    {
        $project = Project::findOrFail($projectId);
        return view('ProjectsAndServices.projectDetails', ["project" => $project]);
    }

    public function create()
    {
        $clients = Client::select('id', 'name')->get();
        return view('ProjectsAndServices.addProject', ["clients" => $clients]);
    }

    public function store()
    {
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

        return redirect()->route('allProjectsAndServices');
    }

    public function edit($projectId)
    {
        $clients = Client::select('id', 'name')->get();
        $project = Project::findOrFail($projectId);
        return view('ProjectsAndServices.addProject', ["clients" => $clients, "project" => $project]);
    }

    public function update($projectId)
    {
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
        return redirect()->route('allProjectsAndServices');
    }

    public function destroy($projectId)
    {
        $project = Project::findOrFail($projectId);
        $project->delete();
        return redirect()->route('allProjectsAndServices');
    }

    public function jsonProjectTranches($projectId){
        $project = Project::findOrFail($projectId);
        return $project->Tranches()->select('id', 'amount')->get()->toJson();
    }
}
