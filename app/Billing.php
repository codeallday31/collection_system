<?php

namespace App;

use DB;
use App\Item;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
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

    // public function scopeWithTotalAmount(Builder $query)
    // {
    //     return $query->select('billings.id','billings.billing_no', 'billings.description', 'clients.name')
    //             ->selectRaw('SUM(amount) as totalAmount')
    //             ->join('clients', 'billings.client_id', 'clients.id')
    //             ->join('items', 'billings.id', 'items.billing_id')
    //             ->orderBy('billing_id', 'desc')
    //             ->groupBy('billings.id')
    //             ->get();
    // }

    public function scopeWithTotalAmount($query)
    {
        $query->withCount([
            'items as totalAmount' => function ($query) {
                    $query->select(DB::raw("SUM(amount) as totalAmount"));
                }
            ]);
    }
}
