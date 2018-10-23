@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
  <div class="col-md-12">
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
      <div class="card-header text-center">{{ __('Medication History') }}</div>
      <div class="card-body">
        @if($viewMedicationCounts==0)
        <div class="form-group row">
          <div class="col-md-12 text-center text-danger">{{ __('Sorry, No record match your search criteria.') }}</div>
        </div>
        @endif
        @if($viewMedicationCounts!=0)
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
            <tr>
            <td><b>Patient Name</b></td>
            <td><b>Patient Email</b></td>
            <td><b>Date</b></td> 
            <td><b>Visit</b></td> 
            <td><b>Action</b></td>
            </tr>
            </thead>
            <tbody>
            @foreach($viewMedications as $viewMedication)
            <tr>
            <td>@if($viewMedication->name!='') {{$viewMedication->name}} @else {{ __('NA') }} @endif</td>
            <td>{{$viewMedication->patient_email}}</td>
            <td>{{$viewMedication->updated_at}}</td>
            <td>{{$viewMedication->visit}}</td>
            <td><a href="{{url('medicationDetails/'.$viewMedication->id.'/')}}"><i class="far fa-file-alt"></i></td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
</div>
 @endsection