<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'details', 'cost', 'remarques', 'file'];
    protected $dates = ['deleted_at'];
}
