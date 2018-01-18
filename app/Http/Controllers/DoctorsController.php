<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use Session;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::paginate(5);

        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctors.create');
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
                'percentage' => 'required|digits_between:1,2'

            ]);
            

        $doctor = new Doctor;
        $doctor->name = $request->name;
        $doctor->percentage = $request->percentage;
        $doctor->save();
        Session::flash('success', 'The record was successfully saved.');
        return redirect()->route('doctors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::find($id);
        return view('doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctor::find($id);
        return view('doctors.edit', compact('doctor'));
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
                'percentage' => 'required|digits_between:1,2'

            ]);

        $doctor = Doctor::find($id);
        $doctor->name = $request->name;
        $doctor->percentage = $request->percentage;
        $doctor->save();
        Session::flash('success', 'The record was successfully saved.');
        return redirect()->route('doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
       // return "Destroy";
        $doctor = Doctor::find($id);
        $doctor->delete();
        Session::flash('success', 'The record was successfully deleted.');
        return redirect()->route('doctors.index');
        //return response()->json(array('message' => 'Record Deleted'));
    }

    public function search($val)
    {
       
        if(is_numeric($val))
        {
            $doctors = Doctor::percentage($val);
        }
        else
        {
            $doctors = Doctor::name($val);
        }
        $doctors = $doctors->paginate(5);
        return view('doctors.index', compact('doctors'));
    }

    

    
}
