<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transfer extends Model
{
    use SoftDeletes;
    protected $fillable = ['banc_acount_from_id', 'banc_acount_to_id', 'transfer_amount', 'percent_id', 'file'];
    protected $dates = ['deleted_at'];

    public function AcountFrom()
    {
        return $this->belongsTo('App\bankacount', '', '');
    }
    public function AcountTo()
    {
        return $this->belongsTo('App\bankacount', '', '');
    }
}
