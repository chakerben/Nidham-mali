<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'details', 'amount', 'expense_date', 'file', 'remarques', 'type_id', 'employee_id', 'project_id', 'service_id', 'compte_id', 'methode_transfert_id'];
    protected $dates = ['deleted_at'];

    public function Employee(){
        return $this->belongsTo('App\Employee');
    }

    public function type(){
        return $this->belongsTo('App\ExpenseType');
    }

    public function Project(){
        return $this->belongsTo('App\Project');
    }

    public function Service(){
        return $this->belongsTo('App\Service');
    }

    public function Rates(){
        return $this->belongsToMany('App\Rate');
    }

    public function bancAcount(){
        return $this->belongsTo('App\BancAcount', 'compte_id');
    }

    public function transferMethode(){
        return $this->belongsTo('App\TransferMethode', 'methode_transfert_id');
    }

    public function empMatch($id){
        return $id === $this->employee_id;
    }

    public function typeMatch($id){
        return $id === $this->type_id;
    }

    public function acountMatch($id) {
        return $id === $this->compte_id;
    }

    public function mTransMatch($id){
        return $id === $this->methode_transfert_id;
    }

    public function prjMatch($id){
        return $id === $this->project_id;
    }

    public function srvMatch($id){
        return $id === $this->service_id;
    }
}