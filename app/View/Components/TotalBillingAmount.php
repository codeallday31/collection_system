<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Http\Request;
use App\Billing;

class TotalBillingAmount extends Component
{
    public $totalAmount;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->totalAmount = request('billing') ? request('billing')->items->sum('amount') : 0;
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
