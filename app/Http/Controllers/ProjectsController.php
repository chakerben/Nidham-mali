<?php

namespace App\Http\Controllers;

use App\Project;
use App\Client;
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
        return redirect()->route('allProjectsAndServices');
    }

    public function destroy($projectId)
    {
        $project = Project::findOrFail($projectId);
        $project->delete();
        return redirect()->route('allProjectsAndServices');
    }
}
