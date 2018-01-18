<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usertype;
use Session;

class UsertypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usertypes = Usertype::paginate(5);
        
        return view('usertypes.index', compact('usertypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usertypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, 
        [
            'name' => 'required|max:50'
        ]);
        

        $usertype = new Usertype;
        $usertype->name = $request->name;
        $usertype->save();
        Session::flash('success', 'The record was successfully saved.');
        return redirect()->route('usertypes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usertype = Usertype::find($id);
        return view('usertypes.show', compact('usertype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usertype = Usertype::find($id);
        return view('usertypes.edit', compact('usertype'));
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

            'name' => 'required|max:50',
            

        ]);

        $usertype = Usertype::find($id);
        $usertype->name = $request->name;
        $usertype->save();
        Session::flash('success', 'The record was successfully saved.');
        return redirect()->route('usertypes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usertype = Usertype::find($id);
        $usertype->delete();
        Session::flash('success', 'The record was successfully deleted.');
        return redirect()->route('usertypes.index');
    }
}
