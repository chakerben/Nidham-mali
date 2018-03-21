<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function index()
    {
        return view('Payments.allPayments');
    }

    public function show()
    {
        #return view('Payments.expenseDetails');
    }

    public function create()
    {
        return view('Payments.addPayment');
    }

    public function store()
    {
        # return view('Payments.store');
    }

    public function edit()
    {
        return view('Payments.addPayment');
    }

    public function update()
    {
        # return view('Payments.update');
    }

    public function destroy()
    {
        # return view('Payments.destroy');
    }
}
