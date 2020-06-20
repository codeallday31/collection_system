<?php

namespace App;

use App\Item;
use Carbon\Carbon;
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

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('F d, Y');
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = replaceTo1LineBreak($value);
    }
}
