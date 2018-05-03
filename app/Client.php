<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class client extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'paymentMode', 'details', 'file'];
    protected $dates = ['deleted_at'];

    public function Projects() {
        return $this->hasMany('App\Project');
    }
}
