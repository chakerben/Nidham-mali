<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function index()
    {
        return view('Expenses.allExpenses');
    }

    public function show()
    {
        #return view('Expenses.expenseDetails');
    }

    public function create()
    {
        return view('Expenses.addExpense');
    }

    public function store()
    {
        # return view('Expenses.store');
    }

    public function edit()
    {
        return view('Expenses.addExpense');
    }

    public function update()
    {
        # return view('Expenses.update');
    }

    public function destroy()
    {
        # return view('Expenses.destroy');
    }
}
