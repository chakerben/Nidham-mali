<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tranche extends Model
{
    use SoftDeletes;
    protected $fillable = ['amount', 'date_tranche', 'project_id'];
    protected $dates = ['deleted_at'];

    public function Project()
    {
        return $this->belongsTo('App\Project');
    }
    
    public function Payments()
    {
        return $this->hasMany('App\Payment');
    }

    public function isLate()
    {
        return $this->date_tranche < date("Y-m-d");
    }
}
