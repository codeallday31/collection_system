<?php

namespace App;

use App\ItemCategory;
use App\Payable;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	protected $fillable = [
		'billing_id', 'category_id', 'payable_id', 'amount', 'description'
	];

	public function category()
	{
		return $this->belongsTo(ItemCategory::class, 'id');
	}

	public function payable()
	{
		return $this->belongsTo(Payable::class);
	}
}
