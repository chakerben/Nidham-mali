<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        return view('ProjectsAndServices.index');
    }

    public function show($serviceId)
    {
        $service = Service::findOrFail($serviceId);
        return view('ProjectsAndServices.serviceDetails', ["service" => $service]);
    }

    public function create()
    {
        return view('ProjectsAndServices.addService');
    }

    public function store()
    {
        $file = input::get('___');
        $service = Service::create([
            'name' => input::get('name'),
            'details' => input::get('details'),
            'cost' => input::get('cost'),
            'remarques' => input::get('remarques'),
            'file' => (is_null($file) || empty($file) || strlen($file)) ? $service->file : $file
            ]);
        return view('ProjectsAndServices.index');
    }

    public function edit($serviceId)
    {
        $service = Service::findOrFail($serviceId);
        return view('ProjectsAndServices.addService', ["service" => $service]);
    }

    public function update($serviceId)
    {
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
        return redirect()->route('allProjectsAndServices');
    }

    public function destroy($serviceId)
    {
        $service = Service::findOrFail($serviceId);
        $service->delete();
        return redirect()->route('allProjectsAndServices');
    }
}
