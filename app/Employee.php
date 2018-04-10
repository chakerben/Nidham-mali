<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'role_id', 'details', 'transfer_method_id', 'file'];
    protected $dates = ['deleted_at'];

    public function cliMatch($id)
    {
        return $id === $this->role_id;
    }
}
