<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $primaryKey = 'name';
    protected $keyType = 'string';
    protected $fillable = ['name', 'value'];
}
