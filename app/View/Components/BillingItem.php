<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\ItemCategory;
use App\Account;

class BillingItem extends Component
{
    public $billingItems;
    public $items;
    public $accounts;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($billingItems)
    {
        $this->billingItems = $billingItems;
        $this->items = ItemCategory::all()->pluck('name', 'id');
        $this->accounts = Account::all()->pluck('name', 'id');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.billing-item');
    }
}
