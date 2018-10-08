
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
      <div class="card-header text-center">{{ __('Change Password') }}</div>
      <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
        @csrf 
          <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }} row">
            <label for="new-password" class="col-md-4 control-label">Current Password</label>
            <div class="col-md-8">
              <input id="current-password" type="password" class="form-control" name="current-password" required>
              @if ($errors->has('current-password'))
              <span class="help-block">
              <strong>{{ $errors->first('current-password') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }} row">
            <label for="new-password" class="col-md-4 control-label">New Password</label>
            <div class="col-md-8">
              <input id="new-password" type="password" class="form-control" name="new-password" required>
              @if ($errors->has('new-password'))
              <span class="help-block">
              <strong>{{ $errors->first('new-password') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>
            <div class="col-md-8">
              <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
            </div>
          </div>
          <div class="form-group row mb-0">
            <div class="col-md-12 text-md-right"><button type="submit" class="btn btn-success" >Submit</button> </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
 @endsection