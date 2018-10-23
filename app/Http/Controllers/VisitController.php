<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use Illuminate\Support\Facades\Route;

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
        $fromDate=$request->get('from');
        $toDate=$request->get('to');
        $medicationHistory = new \App\Visit;
        $medicationHistory = $medicationHistory->select("visits.id","visits.patient_email","visits.updated_at","visits.doctor_email","users.name","visits.visit");
        $medicationHistory = $medicationHistory->leftjoin('users',function($join) {
            $join->on('users.email', '=', 'visits.patient_email');
        });
        $medicationHistory = $medicationHistory->where('visits.patient_email', '=', $request->get('email'));
        $medicationHistory = $medicationHistory->whereBetween('visits.updated_at', [$fromDate, $toDate]);
        $medicationHistory = $medicationHistory->orderBy('visits.visit', 'desc');
        $medicationHistory = $medicationHistory->get();
        $medicationHistoryCount=count($medicationHistory);
        return view('medication_history',['viewMedicationCounts' => $medicationHistoryCount,'viewMedications' => $medicationHistory]);
    }
    public function view(Request $request)
    {
        $id=Route::input('id');
        $viewMedication = new \App\Visit;
        $viewMedication = $viewMedication->select("users.name","visits.doctor_email","users.phone","users.hospital_name","users.specialist","visits.reason","visits.problem","visits.prescribe");
        $viewMedication = $viewMedication->leftjoin('users',function($join) {
            $join->on('users.email', '=', 'visits.doctor_email');
        });
        $viewMedication = $viewMedication->where('visits.id', '=', $id);
        $viewMedication = $viewMedication->get();
        return view('medication_details',['viewMedications' => $viewMedication]);
    }
    public function patientHistory()
    {
        $email=Session::get('email');
        $medicationHistory = new \App\Visit;
        $medicationHistory = $medicationHistory->select("visits.id","visits.patient_email","visits.updated_at","visits.doctor_email","users.name","visits.visit");
        $medicationHistory = $medicationHistory->leftjoin('users',function($join) {
            $join->on('users.email', '=', 'visits.doctor_email');
        });
        $medicationHistory = $medicationHistory->where('visits.patient_email', '=', $email);
        $medicationHistory = $medicationHistory->orderBy('visits.visit', 'desc');
        $medicationHistory = $medicationHistory->get();
        $medicationHistoryCount=count($medicationHistory);
        return view('patient_medication_history',['viewMedicationCounts' => $medicationHistoryCount,'viewMedications' => $medicationHistory]);
    }
}
