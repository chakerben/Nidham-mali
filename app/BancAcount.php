<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BancAcount extends Model
{
    use SoftDeletes;
    protected $fillable = ['bank_name', 'count_num', 'init_amount', 'iban', 'percent_name', 'percent_valu', 'total_amount'];
    protected $dates = ['deleted_at'];
}
