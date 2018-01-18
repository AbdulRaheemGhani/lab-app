<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class SessionsController extends Controller
{
    public function create()
    {
    	return view('sessions.create');
    }


    public function store()
    {
    	//Authenticate the user

    	if(! auth()->attempt(request(['email','password'])))
    	{
            return back()->withErrors(['message' => 'Your username and/or password is incorrect.']);
    	}

        //$data = request(['email','password']);
        //return view('login', compact('data'));        

    	//If ok, sign them in.

    	//redirect to home.
    	return redirect()->route('checkups.index');
    }


    public function destroy()
    {
    	auth()->logout();

    	return redirect('/');
    }
}
