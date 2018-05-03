<?php

namespace App\Http\Controllers;

use PDF;
use App\Role;
use App\Employee;
use App\EmployeeBanklAcount;
use App\EmployeePaypalAcount;
use App\EmployeeOtherTransferMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index() { return redirect()->route('allUsers'); }

    public function show($employeeId) {
        $employee = Employee::findOrFail($employeeId);
        return view('Users.addEmployee', ["employee" => $employee]);
    }

    public function create() {
        if($this->canDo("UsrAe")){
            $roles = Role::select('id', 'name')->get();
            //$transferMethode = TransferMethode::select('id', 'name')->get();
            return view('Users.addEmployee', ["roles" => $roles/*, "transferMethode" => $transferMethode*/]);
        } else {return redirect()->route('allUsers');}
    }

    public function store(Request $request) {
        if($this->canDo("UsrAe")){
            $name = "";
            if(!is_null($request->file('upload'))){
                $name = $request->file('upload')->getClientOriginalName();
                $path = $request->file('upload')->storeAs('files/employees', $name);
            }
        
            $employee = Employee::create([
                'name' => $request->input('name'),
                'role_id' => $request->input('role_id'),
                'details' => $request->input('details'),
                'transfer_method_id' => $request->input('transfer_method_id'),
                'file' => $name
                ]);
        }
        return redirect()->route('allUsers');
    }

    public function storePaypalAcount($employeeId, Request $request) {
        $paypalAcount = EmployeePaypalAcount::create([
            'email' => $request->input('email'),
            'employee_id' => $employeeId
            ]);
        return redirect()->route('employees.edit', ['employee' => $employeeId]);
    }

    public function storeBankAcount($employeeId, Request $request) {
        $bankAcount = EmployeeBankAcount::create([
            'bank_name' => $request->input('bank_name'),
            'acount_num' => $request->input('acount_num'),
            'employee_id' => $employeeId
            ]);
        return redirect()->route('employees.edit', ['employee' => $employeeId]);
    }

    public function storeOtherTransferMethod($employeeId, Request $request) {
        $otherTransferMethod = EmployeeOtherTransferMethod::create([
            'name' => $request->input('name'),
            'acount_num' => $request->input('acount_num'),
            'employee_id' => $employeeId
            ]);
        return redirect()->route('employees.edit', ['employee' => $employeeId]);
    }

    public function edit($employeeId) {
        if($this->canDo("UsrUe")){
            $employee = Employee::findOrFail($employeeId);
            $roles = Role::select('id', 'name')->get();
            //$transferMethode = TransferMethode::select('id', 'name')->get();
            return view('Users.addEmployee', ["employee" => $employee, "roles" => $roles/*, /*"transferMethode" => $transferMethode*/]);
        } else { return redirect()->route('allUsers'); }
    }

    public function update($employeeId, Request $request) {
        if($this->canDo("UsrUe")){
            $employee = Employee::findOrFail($employeeId);

            $name = "";
            if(!is_null($request->file('upload'))){
                $name = $request->file('upload')->getClientOriginalName();
                $path = $request->file('upload')->storeAs('files/employees', $name);
            }
            
            $employee->fill([
                'name' => $request->input('name'),
                'role_id' => $request->input('role_id'),
                'details' => $request->input('details'),
                'transfer_method_id' => $request->input('transfer_method_id'),
                'file' => (is_null($name) || empty($name) || strlen($name)) ? $employee->file : $name
                ]);
            $employee->save();
        }
        return redirect()->route('allUsers');
    }

    public function destroy($employeeId) {
        if($this->canDo("UsrDc")){
            $employee = Employee::findOrFail($employeeId);
            $employee->delete();
        }
        return redirect()->route('allUsers');
    }

    public function generatePDF($employeeId) {
        $employee = Employee::findOrFail($employeeId);
        $pdf = PDF::loadView('users.employeePDF', ["employee" => $employee]);
        return $pdf->download($employee->name.'.pdf');
    }

    private function canDo($section) {
        $permissions = unserialize(Auth::user()->permissions)["UsrPerms"];
        return $permissions["$section"];
    }
}
