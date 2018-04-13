<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transfer extends Model
{
    use SoftDeletes;
    protected $fillable = ['banc_acount_from_id', 'banc_acount_to_id', 'transfer_amount', 'percent_id', 'total_amount', 'file'];
    protected $dates = ['deleted_at'];

    public function AcountFrom()
    {
        return $this->belongsTo('App\BancAcount', 'banc_acount_from_id');
    }
    public function AcountTo()
    {
        return $this->belongsTo('App\BancAcount', 'banc_acount_to_id');
    }
    public function Rate()
    {
        return $this->belongsTo('App\Rate', 'percent_id');
    }
    public function bankFromMatch($name)
    {
        return $this->AcountFrom->bank_name == $name;
    }
    public function bankToMatch($name)
    {
        return $this->AcountTo->bank_name == $name;
    }
    public function bankAcountFromMatch($id)
    {
        return $this->banc_acount_from_id == $id;
    }
    public function bankAcountToMatch($id)
    {
        return $this->banc_acount_to_id == $id;
    }
    public function rateMatch($id)
    {
        return $this->percent_id == $id;
    }
}
