<?php

namespace App\Http\Controllers;

use App\Billing;
use App\Client;
use App\Http\Requests\BillingRequest;
use Illuminate\Support\Facades\DB;

class BillingController extends Controller
{
    public function index()
    {
        $billings = Billing::with('client')->withTotalAmount()->latest()->get();
        
        return view('billing.index', compact('billings'));

    }

    public function create()
    {
        $clients = Client::all()->pluck('name', 'id');

        return view('billing.create', compact('clients'));
    }

    public function store(BillingRequest $request)
    {
        DB::transaction(function() use ($request){
            $billing = Billing::create([
                'client_id' => $request->client_id,
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

    public function edit(Billing $billing)
    {
        $clients = Client::all()->pluck('name', 'id');
        return view('billing.edit', compact('billing', 'clients'));
    }

    public function update(BillingRequest $request, Billing $billing)
    {   
        DB::transaction(function () use ($request, $billing){
            $billing->update($request->all());
            $billing->items()->delete();
            $billing->items()->createMany($request->billing_items);
        });
        
        return redirect()->route('billing.show', $billing->id)->with(notificationMessage('info', 'Billing succesfully updated'));
    }
}
