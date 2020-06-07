<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['name'];
	
	public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }
}
