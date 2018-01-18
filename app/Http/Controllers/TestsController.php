<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use Session;

class TestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::paginate(5);
        
        return view('tests.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tests.create');
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
            'name' => 'required|max:50',
            'normal' => 'required',
            'remarks' => 'required',
            'testcat_id' => 'required'
        ]);
        

        $test = new Test;
        $test->name = $request->name;
        $test->normal = $request->normal;
        $test->remarks = $request->remarks;
        $test->testcat_id = $request->testcat_id;
        $test->save();
        Session::flash('success', 'The record was successfully saved.');
        return redirect()->route('testings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = Test::find($id);
        return view('tests.show', compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test = Test::find($id);
        return view('tests.edit', compact('test'));
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
            'normal' => 'required',
            'remarks' => 'required',
            'testcat_id' => 'required'
        ]);
        

        $test = Test::find($id);
        $test->name = $request->name;
        $test->normal = $request->normal;
        $test->remarks = $request->remarks;
        $test->testcat_id = $request->testcat_id;
        $test->save();
        Session::flash('success', 'The record was successfully saved.');
        return redirect()->route('testings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = Test::find($id);
        $test->delete();
        Session::flash('success', 'The record was successfully deleted.');
        return redirect()->route('testings.index');
    }
}
