<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Checkup;
use App\Patient;
use Session;

class CheckupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkups = Checkup::paginate(5);
        
        return view('checkups.index', compact('checkups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('checkups.create');
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
            'age' => 'required',
            'gender' => 'required',
            'patient_type' => 'required',
            'technition_id' => 'required',
            'result' => 'required',
            'test' => 'required'

        ]);

        if( ($request->patient_type == 2) && ($request->doctor_id==0) )
        {
            return redirect()->back()->withInput(Input::all())->withErrors(['message' => 'Please select a valid Doctor.']);
        }
        
        $patient = new Patient;
        $patient->name = $request->name;
        $patient->age = $request->age;
        $patient->gender = $request->gender;
        $patient->patienttype_id = $request->patient_type;
        $patient->save();

        $checkup = new Checkup;
        $checkup->patient_id = $patient->id;
        $checkup->technition_id = $request->technition_id;
        if(isset($request->doctor_id))
        {
            $checkup->doctor_id = $request->doctor_id;
        }
        $checkup->result = $request->result;
        $checkup->save();

        $tests = $request->test;
        $checkup->tests()->attach($tests);
        
        Session::flash('success', 'The record was successfully saved.');

        return redirect()->route('checkups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $checkup = Checkup::find($id);
        return view('checkups.show', compact('checkup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $checkup = Checkup::find($id);
        return view('checkups.edit', compact('checkup'));
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
            'age' => 'required',
            'gender' => 'required',
            'patient_type' => 'required',
            'technition_id' => 'required',
            'result' => 'required',
            'test' => 'required'

        ]);

        if( ($request->patient_type == 2) && ($request->doctor_id==0) )
        {
            return redirect()->back()->withInput(Input::all())->withErrors(['message' => 'Please select a valid Doctor.']);
        }
        
        $patient = Patient::find($request->patient_id);
        $patient->name = $request->name;
        $patient->age = $request->age;
        $patient->gender = $request->gender;
        $patient->patienttype_id = $request->patient_type;
        $patient->save();

        $checkup = Checkup::find($id);
        $checkup->patient_id = $request->patient_id;
        $checkup->technition_id = $request->technition_id;
        if(isset($request->doctor_id))
        {
            $checkup->doctor_id = $request->doctor_id;
        }
        $checkup->result = $request->result;
        $checkup->save();

        $tests = $request->test;
        $checkup->tests()->sync($tests);

        Session::flash('success', 'The record was successfully saved.');
        
        return redirect()->route('checkups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checkup = Checkup::find($id);
        $patient = $checkup->patient;
        $patient->delete();

        $checkup->tests()->detach();
        $checkup->delete();

        Session::flash('success', 'The record was successfully deleted.');

        return redirect()->route('checkups.index');

    }
}
