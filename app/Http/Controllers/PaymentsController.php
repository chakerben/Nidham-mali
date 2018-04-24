<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Project;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index(Request $request) {
        $allTime = ($request->method() == "PUT" && $request->input('fltrPeriod') == "checkAll") || $request->method() == "GET";
        $allPrjs = ($request->method() == "PUT" && !$request->input('singlePrj')) || $request->method() == "GET";
        $allClis = ($request->method() == "PUT" && !$request->input('singleCli')) || $request->method() == "GET";
        
        if ($allTime && $allPrjs && $allClis) {
            $listPay = Payment::with('tranche.project.client')->get();
        } else {
            $query = Payment::query()->with('tranche.project.client');
            //Filter by project
            if(!$allPrjs){
                $prj = $request->input('prj');
                $query->whereHas('Tranche', function($query) use($prj){
                    $query->where('project_id', '=', $prj);
                });
            }
            //Filter by client
            if(!$allClis){
                $cli = $request->input('cli');
                $query->whereHas('Tranche', function($query) use($cli){
                    $query->whereHas('Project', function($query) use($cli){
                        $query->where('client_id', '=', $cli);
                    });
                });
            }
            //Filter by periode
            if(!$allTime){
                Carbon::setWeekStartsAt(Carbon::MONDAY);
                switch ($request->input('fltrPeriod')) {
                    case 'lastWeek':
                        $from = Carbon::now()->startOfWeek();
                        $to = Carbon::now()->endOfWeek();
                        break;

                    case 'lastMonth':
                        $from = Carbon::now()->startOfMonth();
                        $to = Carbon::now()->endOfMonth();
                        break;

                    case 'lastYear':
                        $from = Carbon::now()->startOfYear();
                        $to = Carbon::now()->endOfYear();
                        break;

                    case 'limitedPeriod':
                        $from = $request->input('from');
                        $to = $request->input('to');
                        break;
                    
                    default:
                        break;
                }
                $query->whereBetween('created_at', [$from, $to]);
            }
            $listPay = $query->get();
        }

        $fltrs = ["allPrjs" => $allPrjs, "allClis" => $allClis, "prj" => $request->input('prj'),
                "cli" => $request->input('cli'), "periode" => $request->input('fltrPeriod'),
                "from" => $request->input('from'), "to" => $request->input('to')];
        $projects = Project::select('id', 'name')->get();
        $clients = Client::select('id', 'name')->get();
        return view('Payments.index', ['listPay' => $listPay, 'projects' => $projects, 'clients' => $clients,
            "fltrs" => $fltrs]);
    }

    public function show($paymentId) {
        if($this->canDo("PayS")){
            $payment = Payment::findOrFail($paymentId);
            return view('PaymentsAndServices.paymentDetails', ["payment" => $payment]);
        } else { return redirect()->route('payments.index'); }
    }

    public function create() {
        if($this->canDo("PayA")){
            $projects = Project::select('id', 'name')->get();
            return view('Payments.addPayment', ["projects" => $projects]);
        } else { return redirect()->route('payments.index'); }
    }

    public function store(Request $request) {
        if($this->canDo("PayA")){
            $name = "";
            if(!is_null($request->file('upload'))){
                $name = $request->file('upload')->getClientOriginalName();
                $path = $request->file('upload')->storeAs('files/payments', $name);
            }
        
            $payment = Payment::create([
                'amount' => $request->input('amount'),
                'type' => $request->input('type'),
                'date_payment' => $request->input('date_payment'),
                'file' => $name,
                'chek_number' => $request->input('chek_number'),
                'paypal_acount' => $request->input('paypal_acount'),
                'bank_to_id' => $request->input('bank_to_id'),
                'tranche_id' => $request->input('tranche_id'),
                'bank_from_id' => $request->input('bank_from_id'),
                'person_transfer_id' => $request->input('person_transfer_id')
                ]);
                
            if (!$request->input('restAmount')) {
                $payment->tranche->payed = 1;
                $payment->tranche->save();
            }
        }
        return redirect()->route('payments.index');
    }

    public function edit($paymentId) {
        if($this->canDo("PayU")){
            $projects = Project::select('id', 'name')->get();
            $payment = Payment::with('tranche.project.client')->findOrFail($paymentId);
            return view('Payments.addPayment', ["projects" => $projects, "payment" => $payment]);
        } else { return redirect()->route('payments.index'); }
    }

    public function update($paymentId, Request $request) {
        if($this->canDo("PayU")){
            $payment = Payment::findOrFail($paymentId);

            $name = "";
            if(!is_null($request->file('upload'))){
                $name = $request->file('upload')->getClientOriginalName();
                $path = $request->file('upload')->storeAs('files/payments', $name);
            }
            
            $payment->fill([
                'amount' => $request->input('amount'),
                'type' => $request->input('type'),
                'date_payment' => $request->input('date_payment'),
                'chek_number' => $request->input('chek_number'),
                'paypal_acount' => $request->input('paypal_acount'),
                'bank_to_id' => $request->input('bank_to_id'),
                'tranche_id' => $request->input('tranche_id'),
                'bank_from_id' => $request->input('bank_from_id'),
                'person_transfer_id' => $request->input('person_transfer_id'),
                'file' => (is_null($name) || empty($name) || strlen($name)) ? $payment->file : $name
                ]);
            $payment->save();

            if (!$request->input('restAmount')) {
                $payment->tranche->payed = 1;
                $payment->tranche->save();
            }
        }
        return redirect()->route('payments.index');
    }

    public function destroy($paymentId) {
        if($this->canDo("PayD")){
            $payment = Payment::findOrFail($paymentId);
            $payment->delete();
            return redirect()->route('payments.index');
        }
    }

    private function canDo($section) {
        $permissions = unserialize(Auth::user()->permissions)["PayPerms"];
        return $permissions["$section"];
    }
}
