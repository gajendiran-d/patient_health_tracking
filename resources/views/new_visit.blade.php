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
      <div class="card-header text-center">{{ __('New Visit') }}</div>
      <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{url('newVisit')}}" enctype="multipart/form-data">
        @csrf 
        <div class="form-group row">
          <label for="email" class="col-md-4 control-label">Patient Email</label>
          <div class="col-md-8"><input name="email" id="email" type="text" class="form-control" value="" required></div>
        </div>
        <div class="form-group row">
          <label for="reason" class="col-md-4 control-label">Reason To Visit</label>
          <div class="col-md-8"><textarea name="reason" id="reason" maxlength="500" class="form-control" required></textarea></div>
        </div>
        <div class="form-group row">
          <label for="problem" class="col-md-4 control-label">Problem Diagnosied</label>
          <div class="col-md-8"><textarea name="problem" id="problem" maxlength="500" class="form-control" required></textarea></div>
        </div>
        <div class="form-group row">
          <label for="prescribe" class="col-md-4 control-label">Medication Prescribed (with dosage and time limit)</label>
          <div class="col-md-8"><textarea name="prescribe" id="prescribe" maxlength="500" class="form-control" required></textarea></div>
        </div>
        <div class="form-group row">
          <label for="period" class="col-md-4 control-label">Period Of Medication (Days)</label>
          <div class="col-md-8"><input name="period" id="period" type="number" class="form-control" value="" required></div>
        </div>
        <div class="form-group row">
          <label for="scan" class="col-md-4 control-label">Scan Report</label>
          <div class="col-md-8"><input type="file" name="report" id="report" class="form-control" value=""/></div>
        </div>
        <div class="form-group row">
          <label for="visit" class="col-md-4 control-label">Number Of Visit</label>
          <div class="col-md-8"><input name="visit" id="visit" type="number" maxlength="3" class="form-control" value="" required></div>
        </div>
        <div class="form-group row mb-0">
          <div class="col-md-12 text-md-right"><button type="submit" class="btn btn-success" >Submit</button></div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
 @endsection