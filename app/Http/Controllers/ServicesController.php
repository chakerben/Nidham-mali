<?php

namespace App\Http\Controllers;

use App\Service;
//use Illuminate\Support\Facades\Input as Input;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index() { return redirect()->route('allProjectsAndServices'); }

    public function show($serviceId) {
        if($this->canDo("SrvS")){
            $service = Service::findOrFail($serviceId);
            $service->totalExpens = 0;
            foreach($service->Expenses()->get() as $expense){
                $service->totalExpens += $expense->amount;
            }

            return view('ProjectsAndServices.serviceDetails', ["service" => $service]);
        } else { return redirect()->route('allProjectsAndServices'); }
    }

    public function create() {
        return ($this->canDo("SrvA")) ? view('ProjectsAndServices.addService') : redirect()->route('allProjectsAndServices');
    }

    public function store(Request $request) {
        if ($this->canDo("SrvA")) {
            $name = "";
            if(!is_null($request->file('upload'))){
                $name = $request->file('upload')->getClientOriginalName();
                $path = $request->file('upload')->storeAs('files/services', $name);
            }
            
            $service = Service::create([
                'name' => $request->input('name'),
                'begin_at' => $request->input('begin_at'),
                'end_at' => $request->input('end_at'),
                'details' => $request->input('details'),
                'cost' => $request->input('cost'),
                'remarques' => $request->input('remarques'),
                'file' => $name
                ]);
        }
        return redirect()->route('allProjectsAndServices');
    }

    public function edit($serviceId) {
        if ($this->canDo("SrvU")) {
            $service = Service::findOrFail($serviceId);
            $service->totalExpens = 0;
            foreach($service->Expenses()->get() as $expense){
                $service->totalExpens += $expense->amount;
            }

            return view('ProjectsAndServices.addService', ["service" => $service]);
        } else {
            return redirect()->route('allProjectsAndServices');
        }
    }

    public function update($serviceId, Request $request) {
        if ($this->canDo("SrvU")) {
            $service = Service::findOrFail($serviceId);

            $name = "";
            if(!is_null($request->file('upload'))){
                $name = $request->file('upload')->getClientOriginalName();
                $path = $request->file('upload')->storeAs('files/services', $name);
            }
            
            $service->fill([
                'name' => $request->input('name'),
                'begin_at' => $request->input('begin_at'),
                'end_at' => $request->input('end_at'),
                'details' => $request->input('details'),
                'cost' => $request->input('cost'),
                'remarques' => $request->input('remarques'),
                'file' => (is_null($name) || empty($name) || strlen($name)) ? $service->file : $name
                ]);
            $service->save();
        }
        return redirect()->route('allProjectsAndServices');
    }

    public function destroy($serviceId) {
        if ($this->canDo("SrvD")) {
            $service = Service::findOrFail($serviceId);
            $service->delete();
        }
        return redirect()->route('allProjectsAndServices');
    }

    public function generatePDF($serviceId) {
        $service = Service::findOrFail($serviceId);
        $service->totalExpens = 0;
        foreach($service->Expenses()->get() as $expense){
            $service->totalExpens += $expense->amount;
        }

        $pdf = PDF::loadView('ProjectsAndServices.servicePDF', ["service" => $service]);
        return $pdf->download($service->name.'_'.$serviceId.'.pdf');
    }

    private function canDo($section){
        $permissions = unserialize(Auth::user()->permissions)["SrvPerms"];
        return $permissions["$section"];
    }
}
