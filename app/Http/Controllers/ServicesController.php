<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index() { return view('ProjectsAndServices.index'); }

    public function show($serviceId)
    {
        if($this->canDo("SrvS")){
            $service = Service::findOrFail($serviceId);
            return view('ProjectsAndServices.serviceDetails', ["service" => $service]);
        } else { return redirect()->route('allProjectsAndServices'); }
    }

    public function create()
    {
        return ($this->canDo("SrvA")) ? view('ProjectsAndServices.addService') : redirect()->route('allProjectsAndServices');
    }

    public function store()
    {
        if ($this->canDo("SrvA")) {
            $file = input::get('___');
            $service = Service::create([
                'name' => input::get('name'),
                'details' => input::get('details'),
                'cost' => input::get('cost'),
                'remarques' => input::get('remarques'),
                'file' => (is_null($file) || empty($file) || strlen($file)) ? $service->file : $file
                ]);
            return view('ProjectsAndServices.index');
        } else {
            return redirect()->route('allProjectsAndServices');
        }
    }

    public function edit($serviceId)
    {
        if ($this->canDo("SrvU")) {
        $service = Service::findOrFail($serviceId);
        return view('ProjectsAndServices.addService', ["service" => $service]);
        } else {
            return redirect()->route('allProjectsAndServices');
        }
    }

    public function update($serviceId)
    {
        if ($this->canDo("SrvU")) {
            $service = Service::findOrFail($serviceId);
            $file = input::get('___');
            $service->fill([
                'name' => input::get('name'),
                'details' => input::get('details'),
                'cost' => input::get('cost'),
                'remarques' => input::get('remarques'),
                'file' => (is_null($file) || empty($file) || strlen($file)) ? $service->file : $file
                ]);
            $service->save();
        }
        return redirect()->route('allProjectsAndServices');
    }

    public function destroy($serviceId)
    {
        if ($this->canDo("SrvD")) {
            $service = Service::findOrFail($serviceId);
            $service->delete();
        }
        return redirect()->route('allProjectsAndServices');
    }

    private function canDo($section){
        $permissions = unserialize(Auth::user()->permissions)["SrvPerms"];
        return $permissions["$section"];
    }
}
