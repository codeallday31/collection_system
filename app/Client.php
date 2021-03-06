<?php

namespace App;

use App\Billing;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
    	'name', 'address', 'tin_no'
    ];

    public function billing()
    {
    	return $this->belongsTo(Billing::class);
    }
    
    public function setAddressAttribute($value)
    {
    	$this->attributes['address'] = str_replace("\r",'', $value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }
}
