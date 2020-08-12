<?php

namespace App;

use App\Billing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
    	'name', 'address', 'tin_no'
    ];

    public function billings()
    {
    	return $this->hasMany(Billing::class);
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
