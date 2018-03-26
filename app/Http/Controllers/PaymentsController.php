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
        return view('Payments.index');
    }

    public function show($paymentId)
    {
        #$payment = Payment::findOrFail($paymentId);
        #return view('PaymentsAndServices.paymentDetails', ["payment" => $payment]);
    }

    public function create()
    {
        return view('Payments.addPayment');
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
        #dd($payment);

        return redirect()->route('payments.index');
    }

    public function edit($paymentId)
    {
        $payment = Payment::findOrFail($paymentId);
        return view('Payments.addPayment', ["payment" => $payment]);
    }

    public function update($paymentId)
    {
        $payment = Payment::findOrFail($paymentId);
        /*
            $file = input::get('___');
            $payment->fill([
                'name' => input::get('name'),
                'begin_at' => input::get('begin_at'),
                'end_at' => input::get('end_at'),
                'details' => input::get('details'),
                'client_id' => input::get('client_id'),
                'cost' => input::get('cost'),
                'remarques' => input::get('remarques'),
                'file' => (is_null($file) || empty($file) || strlen($file)) ? $payment->file : $file
                ]);
            $payment->save();

            $count = $payment->Tranches()->count();
            $prjTranches = $payment->Tranches()->get();
            $trNum = input::get('payment-num');

            if($trNum <= $count){
                $payment->Tranches()->delete();
                for($i=1; $i<=$trNum; $i++){
                    $tranche = Tranche::create([
                        'amount' => input::get('tranche_'.$i.'_amount'),
                        'date_tranche' => input::get('tranche_'.$i.'_date'),
                        'payment_id' => $payment->id
                    ]);
                }
            } else {
                for($i=1; $i<=$count; $i++){
                    $tranche = $prjTranches[$i-1];
                    $tranche->fill([
                        'amount' => input::get('tranche_'.$i.'_amount'),
                        'date_tranche' => input::get('tranche_'.$i.'_date'),
                        'payment_id' => $payment->id
                    ]);
                    $tranche->save();
                }
                for($i=$count+1; $i<=$trNum; $i++){
                    $tranche = Tranche::create([
                        'amount' => input::get('tranche_'.$i.'_amount'),
                        'date_tranche' => input::get('tranche_'.$i.'_date'),
                        'payment_id' => $payment->id
                    ]);
                }
            }
        */
        return redirect()->route('payments');
    }

    public function destroy($paymentId)
    {
        $payment = Payment::findOrFail($paymentId);
        $payment->delete();
        return redirect()->route('payments');
    }
}
