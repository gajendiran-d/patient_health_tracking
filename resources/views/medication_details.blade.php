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
          <label for="prescribe" class="col-md-4 control-label"><b>No of Visit</b></label>
          <div class="col-md-8">{{$viewMedications[0]->visit}}</div>
        </div>
        <div class="form-group row">
          <label for="prescribe" class="col-md-4 control-label"><b>Scan Report</b></label>
          <div class="col-md-8">
          @if($viewMedications[0]->report!='') 
            <a target="_blank" href="{{URL::to('/')}}/scan/{{$viewMedications[0]->report}}"><i class="far fa-file-pdf"></i></a>
          @else 
            {{ __('NA') }} 
          @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="prescribe" class="col-md-4 control-label"><b>Medication Prescribed</b></label>
          <div class="col-md-8">
          @php
          $prescribe=explode("^^",$viewMedications[0]->prescribe);
          $period=explode("^^",$viewMedications[0]->period);
          $time=explode("^^",$viewMedications[0]->time);
          for($i=0;$i<count($prescribe);$i++) {
          @endphp
          <table width="100%">
              <tr valign="top">
                <td width="45%">{{$prescribe[$i]}}</td>
                <td width="3%"> - </td>
                <td width="14%">{{$period[$i]}} days</td>
                <td width="3%"> - </td>
                <td width="35%">
                @if($time[$i]=='M'){{ __('Morning') }}
                @elseif($time[$i]=='A'){{ __('Afternoon') }}
                @elseif($time[$i]=='N'){{ __('Night') }}
                @elseif($time[$i]=='MA'){{ __('Morning,Afternoon') }}
                @elseif($time[$i]=='AN'){{ __('Afternoon,Night') }}
                @elseif($time[$i]=='MN'){{ __('Morning,Night') }}
                @elseif($time[$i]=='MAN'){{ __('Morning,Afternoon,Night') }}
                @endif
                </td>
              </tr>
            </table>
          @php
          }
          @endphp
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
 @endsection