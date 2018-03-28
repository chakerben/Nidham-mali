<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'begin_at', 'end_at', 'details', 'client_id', 'cost', 'remarques', 'file'];
    protected $dates = ['deleted_at'];

    public function Client()
    {
        return $this->belongsTo('App\client');
    }
    
    public function Tranches()
    {
        return $this->hasMany('App\Tranche');
    }

    public function cliMatch($id)
    {
        return $id === $this->client_id;
    }

    public function prjMatch($id)
    {
        return $id === $this->id;
    }
}
