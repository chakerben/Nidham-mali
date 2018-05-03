<?php

namespace App\Http\Controllers;

use PDF;
use App\Rate;
use App\Client;
use App\Expense;
use App\Project;
use App\Service;
use App\Employee;
use App\BancAcount;
use App\ExpenseType;
use App\TransferMethode;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ExpensesController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index(Request $request){
        $projects = Project::select('id', 'name')->get();
        $clients = Client::select('id', 'name')->get();
        $expenseTypes = ExpenseType::select('id', 'name')->get();

        $allTime = ($request->method() == "PUT" && $request->input('fltrPeriod') == "checkAll") || $request->method() == "GET";
        $allTyps = ($request->method() == "PUT" && $request->input('allTypes'))   || $request->method() == "GET";
        $allPrjs = ($request->method() == "PUT" && !$request->input('singlePrj')) || $request->method() == "GET";
        $allClis = ($request->method() == "PUT" && !$request->input('singleCli')) || $request->method() == "GET";
        $fltrTyps = [];

        if ($allTime && $allTyps && $allPrjs && $allClis) {
            $listExp = Expense::with(['type', 'Project.client', 'Service'])->get();
        } else {
            $query = Expense::query()->with(['type', 'Project.client', 'Service']);

            //Filter by project
            if(!$allPrjs){
                $prj = $request->input('prj');
                $query->where('project_id', '=', $prj);
            }
            //Filter by client
            if(!$allClis){
                $cli = $request->input('cli');
                $query->whereHas('Project', function($query) use($cli){
                    $query->where('client_id', '=', $cli);
                });
            }
            //Filter by periode
            if(!$allTime){
                Carbon::setWeekStartsAt(Carbon::MONDAY);
                switch ($request->input('fltrPeriod')) {
                    case 'lastWeek':
                        $from = Carbon::now()->startOfWeek();
                        $to = Carbon::now()->endOfWeek();
                        break;

                    case 'lastMonth':
                        $from = Carbon::now()->startOfMonth();
                        $to = Carbon::now()->endOfMonth();
                        break;

                    case 'lastYear':
                        $from = Carbon::now()->startOfYear();
                        $to = Carbon::now()->endOfYear();
                        break;

                    case 'limitedPeriod':
                        $from = $request->input('from');
                        $to = $request->input('to');
                        break;
                    
                    default:
                        break;
                }
                $query->whereBetween('expense_date', [$from, $to]);
            }
            //Filter by type
            if(!$allTyps){
                foreach($expenseTypes as $type){
                    if($request->input('cb_type_'.$type->id)){
                        $query->orWhere('type_id', '=', $request->input('cb_type_'.$type->id));
                    }
                    $fltrTyps["$type->id"] = $request->input('cb_type_'.$type->id);
                }
            }

            $listExp = $query->get();
        }

        $fltrs = ["allPrjs" => $allPrjs, "allClis" => $allClis, "allTyps" => $allTyps, "allTime" => $allTime,
            "prj" => $request->input('prj'), "cli" => $request->input('cli'), "from" => $request->input('from'),
            "periode" => $request->input('fltrPeriod'), "to" => $request->input('to'), "fltrTyps" => $fltrTyps];
            //dd($request->input('fltrPeriod'));

        return view('Expenses.index', ['listExp' => $listExp, 'projects' => $projects, 'clients' => $clients,
            'expenseTypes' => $expenseTypes, "fltrs" => $fltrs]);
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
            $selected = $expense->Rates->pluck('id')->all();

            return view('Expenses.addExpense', ["projects" => $projects, 'services' => $services, "rates" => $rates,
                "expenseTypes" => $expenseTypes, "bancAcounts" => $bancAcounts, "transferMethodes" => $transferMethodes,
                "listProp" => $listProp, "expense" => $expense, "selected" => $selected]);
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
            $rates = Rate::select('id', 'name', 'value')->get();
            return view('Expenses.addExpense', ["projects" => $projects, 'services' => $services,
                "rates" => $rates, "expenseTypes" => $expenseTypes, "bancAcounts" => $bancAcounts,
                "transferMethodes" => $transferMethodes, "listProp" => $listProp]);
        } else { return redirect()->route('expenses.index'); }
    }

    public function store(Request $request) {
        if($this->canDo("ExpA")){
            $hType = $request->input('hiden_type');

            $name = "";
            if(!is_null($request->file('upload'))){
                $name = $request->file('upload')->getClientOriginalName();
                $path = $request->file('upload')->storeAs('files/expenses', $name);
            }
            
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

    public function generatePDF($expenseId) {
        $expense = Expense::findOrFail($expenseId);
        $pdf = PDF::loadView('expenses.expensePDF', ["expense" => $expense]);
        return $pdf->download($expense->name.'_'.$expenseId.'.pdf');
    }

    private function canDo($section){
        $permissions = unserialize(Auth::user()->permissions)["ExpPerms"];
        return $permissions["$section"];
    }
}
