@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
  <div class="col-md-10">
  	@if (session('error'))
    <div class="alert alert-danger">
    {{ session('error') }}
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success">
    {{ session('success') }}
    </div>
    @endif
    <div class="card">
      <div class="card-header text-center">{{ __('Medication Details') }}</div>
      <div class="card-body">
        <div class="form-group row">
          <label for="name" class="col-md-4 control-label"><b>Doctor Name</b></label>
          <div class="col-md-8">{{$viewMedications[0]->name}}</div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-md-4 control-label"><b>Doctor Email</b></label>
          <div class="col-md-8">{{$viewMedications[0]->doctor_email}}</div>
        </div>
        <div class="form-group row">
          <label for="phone" class="col-md-4 control-label"><b>Doctor Phone</b></label>
          <div class="col-md-8">
          @if($viewMedications[0]->phone!='') {{$viewMedications[0]->phone}} @else {{ __('NA') }} @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="hospital" class="col-md-4 control-label"><b>Hospital Name</b></label>
          <div class="col-md-8">
          @if($viewMedications[0]->hospital_name!='') {{$viewMedications[0]->hospital_name}} @else {{ __('NA') }} @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="specialist" class="col-md-4 control-label"><b>Specialist</b></label>
          <div class="col-md-8">
          @if($viewMedications[0]->specialist!='') {{$viewMedications[0]->specialist}} @else {{ __('NA') }} @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="reason" class="col-md-4 control-label"><b>Reason To Visit</b></label>
          <div class="col-md-8">{{$viewMedications[0]->reason}}</div>
        </div>
        <div class="form-group row">
          <label for="problem" class="col-md-4 control-label"><b>Problem Diagnosied</b></label>
          <div class="col-md-8">{{$viewMedications[0]->problem}}</div>
        </div>
        <div class="form-group row">
          <label for="prescribe" class="col-md-4 control-label"><b>Medication Prescribed</b></label>
          <div class="col-md-8">{{$viewMedications[0]->prescribe}}</div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
 @endsection