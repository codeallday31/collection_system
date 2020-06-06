<?php

namespace App\Http\Controllers;

use App\Billing;
use App\Client;
use App\Http\Requests\BillingRequest;
use App\ItemCategory;
use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillingController extends Controller
{
    public function index()
    {
        $billings = Billing::all();
        return view('billing.index', compact('billings'));
    }

    public function create()
    {
    	$clients = Client::all()->pluck('name', 'id');
    	$items = ItemCategory::all()->pluck('name', 'id');
        $accounts = Account::all()->pluck('name', 'id');

        return view('billing.create', compact(
        	'clients', 'items', 'accounts'
        ));
    }

    public function store(BillingRequest $request)
    {
        DB::transaction(function() use ($request){

            $billing = Billing::create([
                'client_id' => $request->client_id,
                'billing_no' => $request->billing_no,
                'description' => $request->description
            ]);

            $billing->items()->createMany($request['billing_items']);
        });
        return redirect()->route('billing.index')->with(notificationMessage('success', 'Billing Successfully created'));
    }

    public function show(Billing $billing)
    {
        return view('billing.show', compact('billing'));
    }
}
