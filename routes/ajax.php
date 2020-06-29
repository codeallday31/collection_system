<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Ajax', 'as' => 'ajax.billing.'] , function () {
    Route::get('billing/payment/', 'BillingPaymentController@show')->name('show');
});
