<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email=Session::get('email');
        $indexProfile = \App\User::where(['email' => $email,'active_status' => 1])->get();
        return view('profile',['indexProfiles' =>$indexProfile]);
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
        $email=Session::get('email');
        $type=Session::get('type');
        $storeProfile = \App\User::updateOrCreate(['email'=>$email]);
        $storeProfile->name=$request->get('name');
        $storeProfile->age=$request->get('age');
        $storeProfile->gender=$request->get('gender');
        $storeProfile->phone=$request->get('phone');
        $storeProfile->address=$request->get('address');
        if($type=='P') {
            $storeProfile->height=$request->get('height');
            $storeProfile->weight=$request->get('weight');
            $storeProfile->blood_group=$request->get('blood_group');
            $storeProfile->allergies=$request->get('allergies');
        }
        if($type=='D') {
            $storeProfile->hospital_name=$request->get('hospital_name');
            $storeProfile->specialist=$request->get('specialist');
            $storeProfile->degree=$request->get('degree');
            $storeProfile->experience=$request->get('experience');
            $storeProfile->license_number=$request->get('license_number');
            $storeProfile->license_expire=$request->get('license_expire');
        }
        $storeProfile->save();
        return redirect('myProfile')->with('success', 'Profile updated successfully.');
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
        return view('search_patient');
    }

    public function view(Request $request)
    {
        $viewPatient = \App\User::where(['email' => $request->get('email'),'type' => 'P','active_status' => 1])->get();
        $viewPatientCount=count($viewPatient);
        return view('patient_details',['viewPatientCounts' => $viewPatientCount,'viewPatients' => $viewPatient]);
    }
}
