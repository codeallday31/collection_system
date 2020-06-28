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

    public function scopeWithTotalAmount($query)
    {
        $query->withCount([
            'items as totalAmount' => function ($query) {
                    $query->select(DB::raw("SUM(amount) as totalAmount"));
                }
            ]);
    }

    public static function withBillingItems($id)
    {
        return Billing::toBase()->select(
                'item_categories.name as category_name', 
                'accounts.name as account_name', 
                'items.id', 'items.description', 
                'items.amount'
            )->from('items')
            ->join('accounts', 'accounts.id', 'items.account_id')
            ->join('item_categories', 'item_categories.id', 'items.category_id')
            ->where('items.billing_id', $id);
    }

    public static function withClientAmount()
    {
        return Billing::toBase()->addSelect(['amount' => Item::selectRaw('sum(amount) as amount')
            ->whereColumn('billing_id', 'billings.id')
         , 'client_name' => Client::select('name')
                ->whereColumn('id', 'billings.client_id')
        ])
        ->orderBy('id', 'desc');
    }
}
