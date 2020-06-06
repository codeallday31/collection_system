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
}
