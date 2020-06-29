<?php
namespace App\Http\Controllers\Ajax;

use App\Billing;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class BillingPaymentController extends Controller {

	public function show()
	{
		$totalAmount = Billing::withBillingItems(request('billingId'))->sum('amount');
		$html = View::make('modal.billing.show', compact('totalAmount'))->render();
		return $html;
	}
}
