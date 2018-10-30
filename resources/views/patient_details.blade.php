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
      <div class="card-header text-center">{{ __('Patient Details') }}</div>
      <div class="card-body">
        @if($viewPatientCounts==0)
        <div class="form-group row">
          <div class="col-md-12 text-center text-danger">{{ __('Sorry, No record match your search criteria.') }}</div>
        </div>
        @endif
        @if($viewPatientCounts!=0)
        <div class="form-group row">
          <label for="name" class="col-md-4 control-label"><b>Name</b></label>
          <div class="col-md-8">{{$viewPatients[0]->name}}</div>
        </div>
        <div class="form-group row">
          <label for="gender" class="col-md-4 control-label"><b>Gender</b></label>
          <div class="col-md-8">
          @if($viewPatients[0]->gender=='M') {{ __('Male') }} @endif
          @if($viewPatients[0]->gender=='F') {{ __('Female') }} @endif
          @if($viewPatients[0]->gender=='T') {{ __('Transgender') }} @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="age" class="col-md-4 control-label"><b>Age</b></label>
          <div class="col-md-8">
          @if($viewPatients[0]->age!='') {{$viewPatients[0]->age}} @else {{ __('NA') }} @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="phone" class="col-md-4 control-label"><b>Phone</b></label>
          <div class="col-md-8">
          @if($viewPatients[0]->phone!='') {{$viewPatients[0]->phone}} @else {{ __('NA') }} @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="blood_group" class="col-md-4 control-label"><b>Blood Group</b></label>
          <div class="col-md-8">
          @if($viewPatients[0]->blood_group!='') {{$viewPatients[0]->blood_group}} @else {{ __('NA') }} @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="height" class="col-md-4 control-label"><b>Height</b></label>
          <div class="col-md-8">
          @if($viewPatients[0]->height!='') {{$viewPatients[0]->height}} @else {{ __('NA') }} @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="weight" class="col-md-4 control-label"><b>Weight</b></label>
          <div class="col-md-8">
          @if($viewPatients[0]->weight!='') {{$viewPatients[0]->weight}} @else {{ __('NA') }} @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="address" class="col-md-4 control-label"><b>Allergies</b></label>
          <div class="col-md-8">
          @if($viewPatients[0]->allergies!='') {{$viewPatients[0]->allergies}} @else {{ __('NA') }} @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="address" class="col-md-4 control-label"><b>Address</b></label>
          <div class="col-md-8">
          @if($viewPatients[0]->address!='') {{$viewPatients[0]->address}} @else {{ __('NA') }} @endif
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
</div>
 @endsection