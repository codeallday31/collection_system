<?php

namespace App;

use App\Item;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $fillable = [
    	'billing_no', 'description', 'client_id'
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function client()
    {
    	return $this->belongsTo(Client::class);
    }
}
