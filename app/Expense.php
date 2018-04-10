<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'details', 'amount', 'expense_date', 'file', 'remarques', 'type_id', 'prop_id', 'project_id', 'service_id', 'compte_id', 'methode_transfert_id'];
    protected $dates = ['deleted_at'];
}
