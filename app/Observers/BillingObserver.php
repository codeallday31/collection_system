<?php

namespace App\Observers;

use App\Billing;
use Carbon\Carbon;

class BillingObserver
{
    public function creating(BIlling $billing)
    {   
        $billing->description = replaceTo1LineBreak($billing->description);
    }
    
    protected static function generateBillingNo()
    {
        $prefix = Carbon::now()->format('Y');
        $billDataCount = Billing::count();
        return $prefix .'-'. str_pad($billDataCount + 1, 5, '0', STR_PAD_LEFT);
    }    
}
