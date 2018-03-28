<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;
    protected $fillable = ['amount', 'type', 'date_payment', 'file', 'chek_number', 'paypal_acount', 'bank_to_id', 'tranche_id', 'bank_from_id', 'person_transfer_id'];
    protected $dates = ['deleted_at'];

    public function Tranche()
    {
        return $this->belongsTo('App\Tranche');
    }

    public function trMatch($id)
    {
        return $id === $this->tranche->id;
    }
}
