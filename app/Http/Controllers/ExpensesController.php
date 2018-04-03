<?php

namespace App\Http\Controllers;

use App\Expense;
//use App\ExpenseType;
//use App\Comptes;
use App\Project;
use App\Service;
use App\Employee;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function index()
    {
        $listPay = Expense::with('tranche.project.client')->get();
        //dd($listPay);
        return view('Expenses.index', ['listPay' => $listPay]);
    }

    public function show()
    {
        $expense = Expense::findOrFail($paymentId);
        #dd($expense);
        return view('ExpensesAndServices.paymentDetails', ["expense" => $expense]);
    }

    public function create()
    {
        $projects = Project::select('id', 'name')->get();
        $services = Service::select('id', 'name')->get();
        $listProp = Employee::select('id', 'name')->get();
        //$sxpenseTypes = ExpenseType::select('id', 'name')->get();
        //$comptes = Comptes::select('id', 'name')->get();
        return view('Expenses.addExpense', ["projects" => $projects, 'services' => $services]);
    }

    public function store()
    {
        $expense = Expense::create([
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

        return redirect()->route('payments.index');
    }

    public function edit()
    {
        $projects = Project::select('id', 'name')->get();
        $services = Service::select('id', 'name')->get();

        $expense = Expense::with('tranche.project.client')->findOrFail($paymentId);
        $trs = $expense->tranche->project->Tranches()->get();
        #dd($trs);
        return view('Expenses.addExpense', ["projects" => $projects, "expense" => $expense]);
    }

    public function update()
    {
        $expense = Expense::findOrFail($paymentId);
        
        $file = input::get('___');
        $expense->fill([
            'amount' => input::get('amount'),
            'type' => input::get('type'),
            'date_payment' => input::get('date_payment'),
            'chek_number' => input::get('chek_number'),
            'paypal_acount' => input::get('paypal_acount'),
            'bank_to_id' => input::get('bank_to_id'),
            'tranche_id' => input::get('tranche_id'),
            'bank_from_id' => input::get('bank_from_id'),
            'person_transfer_id' => input::get('person_transfer_id'),
            'file' => (is_null($file) || empty($file) || strlen($file)) ? $expense->file : $file
            ]);
        $expense->save();

        if (!input::get('restAmount')) {
            $expense->tranche->payed = 1;
            $expense->tranche->save();
        }
            
        return redirect()->route('payments.index');
    }

    public function destroy()
    {
        $expense = Expense::findOrFail($paymentId);
        $expense->delete();
        return redirect()->route('payments.index');
    }
}
