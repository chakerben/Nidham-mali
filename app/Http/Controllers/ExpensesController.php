<?php

namespace App\Http\Controllers;

use App\Expense;
use App\ExpenseType;
use App\BancAcount;
use App\Project;
use App\Service;
use App\TransferMethode;
use App\Rate;
//use App\Employee;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function index()
    {
        $listExp = Expense::all();
        #dd($listExp);
        return view('Expenses.index', ['listExp' => $listExp]);
    }

    public function show()
    {
        $expense = Expense::findOrFail($expenseId);
        #dd($expense);
        return view('Expenses.addExpense', ["expense" => $expense]);
    }

    public function create()
    {
        $projects = Project::select('id', 'name')->get();
        $services = Service::select('id', 'name')->get();
        $expenseTypes = ExpenseType::select('id', 'name')->get();
        //$listProp = Employee::select('id', 'name')->get();
        $bancAcounts = BancAcount::select('id', 'bank_name', 'count_num')->get();
        $transferMethodes = TransferMethode::select('id', 'name')->get();
        $rates = Rate::select('id', 'name')->get();
        return view('Expenses.addExpense', ["projects" => $projects, 'services' => $services, "rates" => $rates,
            "expenseTypes" => $expenseTypes, "bancAcounts" => $bancAcounts, "transferMethodes" => $transferMethodes]);
    }

    public function store()
    {
        $expense = Expense::create([
            'name' => input::get('name'),
            'type' => input::get('type'),
            'details' => input::get('details'),
            'prop_id' => input::get('prop_id'),
            'project_id' => input::get('project_id'),
            'service_id' => input::get('service_id'),
            'compte_id' => input::get('compte_id'),
            'methode_transfert_id' => input::get('methode_transfert_id'),
            'amount' => input::get('amount'),
            'expense_date' => input::get('expense_date'),
            'file' => input::get('___'),
            'remarques' => input::get('remarques')
            ]);

        return redirect()->route('expenses.index');
    }

    public function edit($expenseId)
    {
        $projects = Project::select('id', 'name')->get();
        $services = Service::select('id', 'name')->get();

        $expense = Expense::findOrFail($expenseId);
        return view('Expenses.addExpense', ["projects" => $projects, "expense" => $expense]);
    }

    public function update()
    {
        $expense = Expense::findOrFail($expenseId);
        
        $file = input::get('___');
        $expense->fill([
            'name' => input::get('name'),
            'type' => input::get('type'),
            'details' => input::get('details'),
            'prop_id' => input::get('prop_id'),
            'project_id' => input::get('project_id'),
            'service_id' => input::get('service_id'),
            'compte_id' => input::get('compte_id'),
            'methode_transfert_id' => input::get('methode_transfert_id'),
            'amount' => input::get('amount'),
            'expense_date' => input::get('expense_date'),
            'remarques' => input::get('remarques'),
            'file' => (is_null($file) || empty($file) || strlen($file)) ? $expense->file : $file
            ]);
        $expense->save();
            
        return redirect()->route('expenses.index');
    }

    public function destroy()
    {
        $expense = Expense::findOrFail($expenseId);
        $expense->delete();
        return redirect()->route('expenses.index');
    }
}
