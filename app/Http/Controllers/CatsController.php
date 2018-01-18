<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testcat;
use Session;

class CatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
         $cats = Testcat::paginate(5);
        
         return view('cats.index', compact('cats'));
       // return "Categories";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cats.create');
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
        

        $cat = new Testcat;
        $cat->name = $request->name;
        $cat->save();
        Session::flash('success', 'The record was successfully saved.');
        return redirect()->route('cats.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat = Testcat::find($id);
        return view('cats.show', compact('cat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Testcat::find($id);
        return view('cats.edit', compact('cat'));
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

            'name' => 'required|max:50'

        ]);

        $cat = Testcat::find($id);
        $cat->name = $request->name;
        $cat->save();
        Session::flash('success', 'The record was successfully saved.');
        return redirect()->route('cats.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Testcat::find($id);
        $cat->delete();
        Session::flash('success', 'The record was successfully deleted.');
        return redirect()->route('cats.index');
    }
}
