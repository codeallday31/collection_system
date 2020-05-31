<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayableRequest;
use App\Payable;
use Illuminate\Http\Request;

class PayableController extends Controller
{

    public function index()
    {
        $payables = Payable::all();
        
        return view('payable.index', compact('payables'));
    }

    public function create()
    {
        return view('payable.create');
    }

    public function store(PayableRequest $request)
    {
        Payable::create($request->all());

        $notification = array(
            'message' => 'Payable successfully created',
            'alert-type' => 'success'
        );

        return redirect()->route('payable.index')->with($notification);
    }


    public function edit($id)
    {
        $payable = Payable::findOrFail($id);

        return view('payable.edit', compact('payable'));
    }

    public function update(PayableRequest $request, $id)
    {
       Payable::findOrFail($id)->update($request->all());
        
        $notification = array(
            'message' => 'Payable successfully updated',
            'alert-type' => 'info'
        );

        return redirect()->route('payable.index')->with($notification);
    }

    public function destroy($id)
    {
        $category = Payable::findOrFail($id);
        
        $isDeleted = $category->delete();

        if ($isDeleted) {
            $notification = array(
                'message' => 'Payable successfully deleted',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);    
        }
    }
}
