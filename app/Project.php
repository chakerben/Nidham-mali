<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'begin_at', 'end_at', 'details', 'client_id', 'cost', 'remarques', 'file'];
    protected $dates = ['deleted_at'];
}
