<?php

namespace App\View\Components;

use App\Billing;
use Illuminate\View\Component;

class TotalBillingAmount extends Component
{
    public $totalAmount;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($totalBilling = null)
    {
        $this->totalAmount = $totalBilling ?? 0;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.total-billing-amount');
    }
}
