<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Project;
use App\Tranche;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index() {
        $listPay = Payment::with('tranche.project.client')->get();
        return view('Payments.index', ['listPay' => $listPay]);
    }

    public function show($paymentId)
    {
        if($this->canDo("PayS")){
            $payment = Payment::findOrFail($paymentId);
            return view('PaymentsAndServices.paymentDetails', ["payment" => $payment]);
        } else { return redirect()->route('payments.index'); }
    }

    public function create()
    {
        if($this->canDo("PayA")){
            $projects = Project::select('id', 'name')->get();
            return view('Payments.addPayment', ["projects" => $projects]);
        } else { return redirect()->route('payments.index'); }
    }

    public function store()
    {
        if($this->canDo("PayA")){
            $payment = Payment::create([
                'amount' => input::get('amount'),
                'type' => input::get('type'),
                'date_payment' => input::get('date_payment'),
                'file' => input::get('___'),
                'chek_number' => input::get('chek_number'),
                'paypal_acount' => input::get('paypal_acount'),
                'bank_to_id' => input::get('bank_to_id'),
                'tranche_id' => input::get('tranche_id'),
                'bank_from_id' => input::get('bank_from_id'),
                'person_transfer_id' => input::get('person_transfer_id')
                ]);
                
            if (!input::get('restAmount')) {
                $payment->tranche->payed = 1;
                $payment->tranche->save();
            }
        }
        return redirect()->route('payments.index');
    }

    public function edit($paymentId)
    {
        if($this->canDo("PayU")){
            $projects = Project::select('id', 'name')->get();
            $payment = Payment::with('tranche.project.client')->findOrFail($paymentId);
            return view('Payments.addPayment', ["projects" => $projects, "payment" => $payment]);
        } else { return redirect()->route('payments.index'); }
    }

    public function update($paymentId)
    {
        if($this->canDo("PayU")){
            $payment = Payment::findOrFail($paymentId);
            
            $file = input::get('___');
            $payment->fill([
                'amount' => input::get('amount'),
                'type' => input::get('type'),
                'date_payment' => input::get('date_payment'),
                'chek_number' => input::get('chek_number'),
                'paypal_acount' => input::get('paypal_acount'),
                'bank_to_id' => input::get('bank_to_id'),
                'tranche_id' => input::get('tranche_id'),
                'bank_from_id' => input::get('bank_from_id'),
                'person_transfer_id' => input::get('person_transfer_id'),
                'file' => (is_null($file) || empty($file) || strlen($file)) ? $payment->file : $file
                ]);
            $payment->save();

            if (!input::get('restAmount')) {
                $payment->tranche->payed = 1;
                $payment->tranche->save();
            }
        }
        return redirect()->route('payments.index');
    }

    public function destroy($paymentId)
    {
        if($this->canDo("PayD")){
            $payment = Payment::findOrFail($paymentId);
            $payment->delete();
            return redirect()->route('payments.index');
        }
    }

    private function canDo($section){
        $permissions = unserialize(Auth::user()->permissions)["PayPerms"];
        return $permissions["$section"];
    }
}
