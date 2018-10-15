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
      <div class="card-header text-center">{{ __('Search Medication') }}</div>
      <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{url('medicationHistory')}}">
        @csrf 
        <div class="form-group row">
          <label for="email" class="col-md-1 control-label">Email</label>
          <div class="col-md-3"><input name="email" id="email" type="text" class="form-control" value="" required></div>
          <label for="from" class="col-md-1 control-label">From</label>
          <div class="col-md-2"><input name="from" id="from" type="date" class="form-control" value="" required></div>
          <label for="to" class="col-md-1 control-label">To</label>
          <div class="col-md-2"><input name="to" id="to" type="date" class="form-control" value="" required></div>
          <div class="col-md-2 text-md-right"><button type="submit" class="btn btn-success" >Submit</button></div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
 @endsection