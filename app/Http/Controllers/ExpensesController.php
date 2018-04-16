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
use Illuminate\Support\Facades\Auth;

class ExpensesController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index(){
        $listExp = Expense::with(['type', 'Project.client', 'Service'])->get();
        return view('Expenses.index', ['listExp' => $listExp]);
    }

    public function show($expenseId)
    {
        if($this->canDo("ExpS")){
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
        } else { return redirect()->route('expenses.index'); }
    }

    public function create()
    {
        if($this->canDo("ExpA")){
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
        } else { return redirect()->route('expenses.index'); }
    }

    public function store()
    {
        if($this->canDo("ExpA")){
            $hType = input::get('hiden_type');
            
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
        }
        return redirect()->route('expenses.index');
    }

    public function edit($expenseId)
    {
        if($this->canDo("ExpU")){
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
        } else { return redirect()->route('expenses.index'); }
    }

    public function update($expenseId)
    {
        if($this->canDo("ExpU")){
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
        }
        return redirect()->route('expenses.index');
    }

    public function destroy()
    {
        if($this->canDo("ExpD")){
            $expense = Expense::findOrFail($expenseId);
            $expense->delete();
        }
        return redirect()->route('expenses.index');
    }

    private function canDo($section){
        $permissions = unserialize(Auth::user()->permissions)["ExpPerms"];
        return $permissions["$section"];
    }
}
