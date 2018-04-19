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
use App\Client;
//use Illuminate\Support\Facades\Input as Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpensesController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index(){
        $listExp = Expense::with(['type', 'Project.client', 'Service'])->get();
        $projects = Project::select('id', 'name')->get();
        $clients = Client::select('id', 'name')->get();
        $expenseTypes = ExpenseType::select('id', 'name')->get();
        return view('Expenses.index', ['listExp' => $listExp, 'projects' => $projects, 'clients' => $clients, 'expenseTypes' => $expenseTypes]);
    }

    public function show($expenseId) {
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

    public function create() {
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

    public function store(Request $request) {
        if($this->canDo("ExpA")){
            $hType = $request->input('hiden_type');
            $name = $request->file('upload')->getClientOriginalName();
            $path = $request->file('upload')->storeAs('files/expenses', $name);
            
            $expense = Expense::create([
                'name' => $request->input('name'),
                'type_id' => $request->input('type_id'),
                'details' => $request->input('details'),
                'employee_id' => $request->input('prop_id'),
                'project_id' => ($hType == 2) ? $request->input('reference_id') : null,
                'service_id' => ($hType == 3) ? $request->input('reference_id') : null,
                'compte_id' => $request->input('compte_id'),
                'methode_transfert_id' => $request->input('methode_transfert_id'),
                'amount' => $request->input('amount'),
                'expense_date' => $request->input('expense_date'),
                'file' => $name,
                'remarques' => $request->input('remarques')
                ]);
            $expense->Rates()->sync(array_values($request->input('expense_rates')));
        }
        return redirect()->route('expenses.index');
    }

    public function edit($expenseId) {
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

    public function update($expenseId, Request $request) {
        if($this->canDo("ExpU")){
            $expense = Expense::findOrFail($expenseId);

            $name = "";
            if(!is_null($request->file('upload'))){
                $name = $request->file('upload')->getClientOriginalName();
                $path = $request->file('upload')->storeAs('files/expenses', $name);
            }
            
            $hType = $request->input('hiden_type');
            $expense->fill([
                'name' => $request->input('name'),
                'type_id' => $request->input('type_id'),
                'details' => $request->input('details'),
                'employee_id' => $request->input('prop_id'),
                'project_id' => ($hType == 2) ? $request->input('reference_id') : null,
                'service_id' => ($hType == 3) ? $request->input('reference_id') : null,
                'compte_id' => $request->input('compte_id'),
                'methode_transfert_id' => $request->input('methode_transfert_id'),
                'amount' => $request->input('amount'),
                'expense_date' => $request->input('expense_date'),
                'file' => (is_null($name) || empty($name) || strlen($name)) ? $expense->file : $name,
                'remarques' => $request->input('remarques')
                ]);
            $expense->save();
            $expense->Rates()->sync(array_values($request->input('expense_rates')));
        }
        return redirect()->route('expenses.index');
    }

    public function destroy() {
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
