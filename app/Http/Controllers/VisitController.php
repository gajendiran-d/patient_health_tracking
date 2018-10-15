<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('new_visit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctor_email=Session::get('email');
        $storeVisit = new \App\Visit;
        $storeVisit->patient_email=$request->get('email');
        $storeVisit->doctor_email=$doctor_email;
        $storeVisit->reason=$request->get('reason');
        $storeVisit->problem=$request->get('problem');
        $storeVisit->prescribe=$request->get('prescribe');
        $storeVisit->visit=$request->get('visit');
        $storeVisit->save();
        return redirect('newVisit')->with('success', 'Visit details saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search()
    {
        return view('search_medication');
    }

    public function history(Request $request)
    {
        $viewPatient = \App\Visit::where(['patient_email' => $request->get('email'),'active_status' => 1])->get();
        $viewPatientCount=count($viewPatient);
        return view('patient_details',['viewPatientCounts' => $viewPatientCount,'viewPatients' => $viewPatient]);
    }
}
