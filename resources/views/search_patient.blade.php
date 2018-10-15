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
      <div class="card-header text-center">{{ __('Search Patient') }}</div>
      <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{url('patientDetails')}}">
        @csrf 
        <div class="form-group row">
          <label for="email" class="col-md-4 control-label">Patient Email</label>
          <div class="col-md-6"><input name="email" id="email" type="text" class="form-control" value="" required></div>
          <div class="col-md-2 text-md-right"><button type="submit" class="btn btn-success" >Submit</button></div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
 @endsection