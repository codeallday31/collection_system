<?php

namespace App;

use App\Account;
use App\ItemCategory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	protected $fillable = [
		'billing_id', 'category_id', 'account_id', 'amount', 'description'
	];

	public function category()
	{
		return $this->belongsTo(ItemCategory::class, 'category_id');
	}

	public function account()
	{
		return $this->belongsTo(Account::class);
	}
}
