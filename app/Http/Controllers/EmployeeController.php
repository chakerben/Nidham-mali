<?php

namespace App\Http\Controllers;

use App\Employee;
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
        //$employee = Employee::findOrFail($employeeId);
        //return view('Users.index');
        return redirect()->route('allUsers');
    }

    public function create()
    {
        return view('Users.addEmployee');
    }

    public function store()
    {
        $employee = Employee::create([
            'name' => input::get('name')
            ]);
            return redirect()->route('allUsers');
    }

    public function edit($employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        return view('Users.addEmployee', ["employee" => $employee]);
    }

    public function update($employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        $file = input::get('___');
        $employee->fill([
            'name' => input::get('name')
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
