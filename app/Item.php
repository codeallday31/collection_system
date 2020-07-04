<?php

namespace App;

use App\Account;
use App\ItemCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
	use SoftDeletes;

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
