<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Project;
use App\Client;
//use App\Tranche;
//use Illuminate\Support\Facades\Input as Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index() {
        $listPay = Payment::with('tranche.project.client')->get();
        $projects = Project::select('id', 'name')->get();
        $clients = Client::select('id', 'name')->get();
        return view('Payments.index', ['listPay' => $listPay, 'projects' => $projects, 'clients' => $clients]);
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
            $name = $request->file('upload')->getClientOriginalName();
            $path = $request->file('upload')->storeAs('files/payments', $name);
        
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
