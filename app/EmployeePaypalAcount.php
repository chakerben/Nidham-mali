<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeePaypalAcount extends Model
{
    use SoftDeletes;
    protected $fillable = ['email', 'employee_id'];
    protected $dates = ['deleted_at'];

    public function Employee()
    {
        return $this->belongsTo('App\employee');
    }
}
