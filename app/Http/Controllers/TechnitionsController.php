<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Technition;
use Session;

class TechnitionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technitions = Technition::paginate(5);
        return view('technitions.index', compact('technitions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('technitions.create');
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
        

        $technition = new Technition;
        $technition->name = $request->name;
        $technition->save();
        Session::flash('success', 'The record was successfully saved.');
        return redirect()->route('technitions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $technition = Technition::find($id);
        return view('technitions.show', compact('technition'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $technition = Technition::find($id);
        return view('technitions.edit', compact('technition'));
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

        $technition = Technition::find($id);
        $technition->name = $request->name;
        $technition->save();
        Session::flash('success', 'The record was successfully saved.');
        return redirect()->route('technitions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $technition = Technition::find($id);
        $technition->delete();
        Session::flash('success', 'The record was successfully deleted.');
        return redirect()->route('technitions.index');
    }
}
