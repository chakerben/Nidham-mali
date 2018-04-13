<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'role_id', 'details', 'transfer_method_id', 'file'];
    protected $dates = ['deleted_at'];

    public function PaypalAcounts()
    {
        return $this->hasMany('App\EmployeePaypalAcount');
    }

    public function BankAcounts()
    {
        return $this->hasMany('App\EmployeeBankAcount');
    }

    public function OtherTransferMethods()
    {
        return $this->hasMany('App\EmployeeOtherTransferMethod');
    }

    public function Expenses()
    {
        return $this->hasMany('App\Expense');
    }

    public function cliMatch($id)
    {
        return $id === $this->role_id;
    }
}
