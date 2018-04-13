<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeOtherTransferMethod extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'acount_num', 'employee_id'];
    protected $dates = ['deleted_at'];

    public function Employee()
    {
        return $this->belongsTo('App\employee');
    }
}
