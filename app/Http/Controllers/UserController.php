<?php

namespace App\Http\Controllers;

use App\Http\Requests\User as RequestsUser;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::paginate(50)->except(currentUser()->id);

        return view('user.index', compact('users'));
    }

    public function create() 
    {
        return view('user.create');
    }

    public function store(RequestsUser $request)
    {   
        $request['password'] = bcrypt('12345678');
        
        User::create($request->all());

        $notification = array(
            'message' => 'User successfully created',
            'alert-type' => 'success'
        );
        
        return redirect()->route('user.index')->with($notification);
    }
}
