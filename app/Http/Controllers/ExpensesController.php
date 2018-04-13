<?php

namespace App\Http\Controllers;

use App\Expense;
use App\ExpenseType;
use App\BancAcount;
use App\Project;
use App\Service;
use App\TransferMethode;
use App\Rate;
use App\Employee;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function index()
    {
        $listExp = Expense::with(['type', 'Project.client', 'Service'])->get();
        //dd($listExp);
        return view('Expenses.index', ['listExp' => $listExp]);
    }

    public function show($expenseId)
    {
        $projects = Project::select('id', 'name')->get();
        $services = Service::select('id', 'name')->get();
        $expenseTypes = ExpenseType::select('id', 'name')->get();
        $listProp = Employee::select('id', 'name')->get();
        $bancAcounts = BancAcount::select('id', 'bank_name', 'count_num')->get();
        $transferMethodes = TransferMethode::select('id', 'name')->get();
        $rates = Rate::select('id', 'name')->get();

        $expense = Expense::findOrFail($expenseId);

        return view('Expenses.addExpense', ["projects" => $projects, 'services' => $services, "rates" => $rates,
            "expenseTypes" => $expenseTypes, "bancAcounts" => $bancAcounts, "transferMethodes" => $transferMethodes,
            "listProp" => $listProp, "expense" => $expense]);
    }

    public function create()
    {
        $projects = Project::select('id', 'name')->get();
        $services = Service::select('id', 'name')->get();
        $expenseTypes = ExpenseType::select('id', 'name')->get();
        $listProp = Employee::select('id', 'name')->get();
        $bancAcounts = BancAcount::select('id', 'bank_name', 'count_num')->get();
        $transferMethodes = TransferMethode::select('id', 'name')->get();
        $rates = Rate::select('id', 'name')->get();
        return view('Expenses.addExpense', ["projects" => $projects, 'services' => $services, "rates" => $rates,
            "expenseTypes" => $expenseTypes, "bancAcounts" => $bancAcounts, "transferMethodes" => $transferMethodes,
            "listProp" => $listProp]);
    }

    public function store()
    {
        $hType = input::get('hiden_type');
        //dd(input::get('expense_rates'));
        $expense = Expense::create([
            'name' => input::get('name'),
            'type_id' => input::get('type_id'),
            'details' => input::get('details'),
            'employee_id' => input::get('prop_id'),
            'project_id' => ($hType == 2) ? input::get('reference_id') : null,
            'service_id' => ($hType == 3) ? input::get('reference_id') : null,
            'compte_id' => input::get('compte_id'),
            'methode_transfert_id' => input::get('methode_transfert_id'),
            'amount' => input::get('amount'),
            'expense_date' => input::get('expense_date'),
            'file' => input::get('___'),
            'remarques' => input::get('remarques')
            ]);
        $expense->Rates()->sync(array_values(input::get('expense_rates')));
        return redirect()->route('expenses.index');
    }

    public function edit($expenseId)
    {
        $projects = Project::select('id', 'name')->get();
        $services = Service::select('id', 'name')->get();
        $expenseTypes = ExpenseType::select('id', 'name')->get();
        $listProp = Employee::select('id', 'name')->get();
        $bancAcounts = BancAcount::select('id', 'bank_name', 'count_num')->get();
        $transferMethodes = TransferMethode::select('id', 'name')->get();
        $rates = Rate::select('id', 'name')->get();

        $expense = Expense::findOrFail($expenseId);
        $selected = $expense->Rates->pluck('id')->all();

        return view('Expenses.addExpense', ["projects" => $projects, 'services' => $services, "rates" => $rates,
            "expenseTypes" => $expenseTypes, "bancAcounts" => $bancAcounts, "transferMethodes" => $transferMethodes,
            "listProp" => $listProp, "expense" => $expense, "selected" => $selected]);
    }

    public function update($expenseId)
    {
        $expense = Expense::findOrFail($expenseId);
        
        $file = input::get('___');
        $hType = input::get('hiden_type');
        $expense->fill([
            'name' => input::get('name'),
            'type_id' => input::get('type_id'),
            'details' => input::get('details'),
            'employee_id' => input::get('prop_id'),
            'project_id' => ($hType == 2) ? input::get('reference_id') : null,
            'service_id' => ($hType == 3) ? input::get('reference_id') : null,
            'compte_id' => input::get('compte_id'),
            'methode_transfert_id' => input::get('methode_transfert_id'),
            'amount' => input::get('amount'),
            'expense_date' => input::get('expense_date'),
            'file' => (is_null($file) || empty($file) || strlen($file)) ? $expense->file : $file,
            'remarques' => input::get('remarques')
            ]);
        $expense->save();
        $expense->Rates()->sync(array_values(input::get('expense_rates')));
            
        return redirect()->route('expenses.index');
    }

    public function destroy()
    {
        $expense = Expense::findOrFail($expenseId);
        $expense->delete();
        return redirect()->route('expenses.index');
    }
}
