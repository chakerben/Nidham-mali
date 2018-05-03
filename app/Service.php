<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'begin_at', 'end_at', 'details', 'cost', 'remarques', 'file'];
    protected $dates = ['deleted_at'];

    public function Expenses(){
        return $this->hasMany('App\Expense');
    }
}
