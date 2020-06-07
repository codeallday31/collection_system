<?php

use App\Billing;
use Illuminate\Support\Carbon;

function currentUser()
{
    return auth()->user();
}

function notificationMessage($alertType, $message) {
	return [
		'message' => $message,
        'alert-type' => $alertType
	];
}

function generateBillingNo()
{
	$prefix = Carbon::now()->format('Y');
	$billDataCount = Billing::count();
	return $prefix .'-'. str_pad($billDataCount + 1, 5, '0', STR_PAD_LEFT);
}
