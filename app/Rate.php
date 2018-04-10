<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rate extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'value', 'remarques'];
    protected $dates = ['deleted_at'];
}
