<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Role;
use App\TransferMethode;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return redirect()->route('allUsers');
    }

    public function show($employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        return view('Users.addEmployee', ["employee" => $employee]);
    }

    public function create()
    {
        $roles = Role::select('id', 'name')->get();
        $transferMethode = TransferMethode::select('id', 'name')->get();
        return view('Users.addEmployee', ["roles" => $roles, "transferMethode" => $transferMethode]);
    }

    public function store()
    {
        $employee = Employee::create([
            'name' => input::get('name'),
            'role_id' => input::get('role_id'),
            'details' => input::get('details'),
            'transfer_method_id' => input::get('transfer_method_id'),
            'file' => input::get('___')
            ]);
        return redirect()->route('allUsers');
    }

    public function edit($employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        $roles = Role::select('id', 'name')->get();
        $transferMethode = TransferMethode::select('id', 'name')->get();
        return view('Users.addEmployee', ["employee" => $employee, "roles" => $roles, "transferMethode" => $transferMethode]);
    }

    public function update($employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        $file = input::get('___');
        $employee->fill([
            'name' => input::get('name'),
            'role_id' => input::get('role_id'),
            'details' => input::get('details'),
            'transfer_method_id' => input::get('transfer_method_id'),
            'file' => (is_null($file) || empty($file) || strlen($file)) ? $employee->file : $file
            ]);
        $employee->save();
        return redirect()->route('allUsers');
    }

    public function destroy($employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        $employee->delete();
        return redirect()->route('allUsers');
    }
}
