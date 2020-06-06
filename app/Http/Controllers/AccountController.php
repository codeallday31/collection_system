<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function index()
    {
        $accounts = Account::all();
        
        return view('account.index', compact('accounts'));
    }

    public function create()
    {
        return view('account.create');
    }

    public function store(AccountRequest $request)
    {
        Account::create($request->all());

        $notification = array(
            'message' => 'Account successfully created',
            'alert-type' => 'success'
        );

        return redirect()->route('account.index')->with($notification);
    }


    public function edit($id)
    {
        $account = Account::findOrFail($id);

        return view('account.edit', compact('account'));
    }

    public function update(AccountRequest $request, $id)
    {
       Account::findOrFail($id)->update($request->all());
        
        $notification = array(
            'message' => 'Account successfully updated',
            'alert-type' => 'info'
        );

        return redirect()->route('account.index')->with($notification);
    }

    public function destroy($id)
    {
        $category = Account::findOrFail($id);
        
        $isDeleted = $category->delete();

        if ($isDeleted) {
            $notification = array(
                'message' => 'Account successfully deleted',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);    
        }
    }
}
