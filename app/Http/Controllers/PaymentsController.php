<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Project;
use App\Tranche;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function index()
    {
        $listPay = Payment::with('tranche.project.client')->get();
        //dd($listPay);
        return view('Payments.index', ['listPay' => $listPay]);
    }

    public function show($paymentId)
    {
        $payment = Payment::findOrFail($paymentId);
        return view('PaymentsAndServices.paymentDetails', ["payment" => $payment]);
        #dd($payment);
    }

    public function create()
    {
        $projects = Project::select('id', 'name')->get();
        return view('Payments.addPayment', ["projects" => $projects]);
    }

    public function store()
    {
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

        return redirect()->route('payments.index');
    }

    public function edit($paymentId)
    {
        $projects = Project::select('id', 'name')->get();
        $payment = Payment::with('tranche.project.client')->findOrFail($paymentId);
        $trs = $payment->tranche->project->Tranches()->get();
        #dd($trs);
        return view('Payments.addPayment', ["projects" => $projects, "payment" => $payment]);
    }

    public function update($paymentId)
    {
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
            
        return redirect()->route('payments.index');
    }

    public function destroy($paymentId)
    {
        $payment = Payment::findOrFail($paymentId);
        $payment->delete();
        return redirect()->route('payments.index');
    }
}
