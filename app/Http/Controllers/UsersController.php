<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);
        
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [

    		'name' => 'required',
    		'email' => 'required|email',
            'password' => 'required|confirmed',
            'usertype_id' => 'required'

    	]);	

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->usertype_id = $request->usertype_id; 
        $user->save();
        Session::flash('success', 'The record was successfully saved.');

    	return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        $this->validate($request, 
        [

            'name' => 'required',
    		'email' => 'required|email',
            'usertype_id' => 'required'

        ]);

        $user = User::find($id);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->usertype_id = $request->usertype_id;
        $user->save();
        Session::flash('success', 'The record was successfully saved.');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('success', 'The record was successfully deleted.');
        return redirect()->route('users.index');
    }

    public function changePassword($id)
    {
        $user = User::find($id);
        return view('users.changePassword', compact('user')) ;
    }

    public function passwordUpdate(Request $request, $id)
    {
        $this->validate($request, 
        [

            'current_password' => 'required',
    		'password' => 'required|confirmed'

        ]);

        $user = User::find($id);
        if(! Hash::check($request->current_password, $user->password))
        {
            return back()->withErrors(['message' => 'Your current password is incorrect.']);
        }
        $user->password = Hash::make($request->password);
        $user->save();
        Session::flash('success', 'The record was successfully saved.');
        return redirect()->route('users.index');
    }
}
