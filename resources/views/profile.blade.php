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
      <div class="card-header text-center">{{ __('My Profile') }}</div>
      <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{url('myProfile')}}">
        @csrf 
        @php
        $type=Session::get('type');
        @endphp
        <div class="form-group row">
          <label for="name" class="col-md-4 control-label">Name</label>
          <div class="col-md-8"><input name="name" id="name" type="text" maxlength="30" class="form-control" value="{{$indexProfiles[0]->name}}" required></div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-md-4 control-label">Email</label>
          <div class="col-md-8"><input name="email" id="email" type="text" class="form-control" value="{{$indexProfiles[0]->email}}" readonly></div>
        </div>
        <div class="form-group row">
          <label for="age" class="col-md-4 control-label">Age</label>
          <div class="col-md-8"><input name="age" id="age" type="number" maxlength="3" class="form-control" value="{{$indexProfiles[0]->age}}" required></div>
        </div>
        <div class="form-group row">
          <label for="gender" class="col-md-4 control-label">Gender</label>
          <div class="col-md-2"><input name="gender" id="gender" type="radio" value="M" required {{$indexProfiles[0]->gender == 'M' ? 'checked' : '' }} > Male</div>
          <div class="col-md-2"><input name="gender" id="gender" type="radio" value="F" required {{$indexProfiles[0]->gender == 'F' ? 'checked' : '' }} > Female</div>
          <div class="col-md-2"><input name="gender" id="gender" type="radio" value="T" required {{$indexProfiles[0]->gender == 'T' ? 'checked' : '' }} > Transgender</div>
        </div>
        <div class="form-group row">
          <label for="phone" class="col-md-4 control-label">Phone</label>
          <div class="col-md-8"><input name="phone" id="phone" type="number" maxlength="10" class="form-control" value="{{$indexProfiles[0]->phone}}" required></div>
        </div>
        <div class="form-group row">
          <label for="address" class="col-md-4 control-label">Address</label>
          <div class="col-md-8"><textarea name="address" id="address" maxlength="500" class="form-control" required>{{$indexProfiles[0]->address}}</textarea></div>
        </div>
        @if($type=='P')
        <div class="form-group row">
          <label for="height" class="col-md-4 control-label">Height</label>
          <div class="col-md-8"><input name="height" id="height" type="text" maxlength="5" class="form-control" value="{{$indexProfiles[0]->height}}" ></div>
        </div>
        <div class="form-group row">
          <label for="weight" class="col-md-4 control-label">Weight</label>
          <div class="col-md-8"><input name="weight" id="weight" type="text" maxlength="5" class="form-control" value="{{$indexProfiles[0]->weight}}" ></div>
        </div>
        <div class="form-group row">
          <label for="weight" class="col-md-4 control-label">Blood Group</label>
          <div class="col-md-8">
          <select name="blood_group" id="blood_group" class="form-control">
            <option value=''>Select</option>
            <option value='A+' {{$indexProfiles[0]->blood_group == 'A+' ? 'selected' : '' }}>A +ve</option>
            <option value='A-' {{$indexProfiles[0]->blood_group == 'A-' ? 'selected' : '' }}>A -ve</option>
            <option value='B+' {{$indexProfiles[0]->blood_group == 'B+' ? 'selected' : '' }}>B +ve</option>
            <option value='B-' {{$indexProfiles[0]->blood_group == 'B-' ? 'selected' : '' }}>B -ve</option>
            <option value='O+' {{$indexProfiles[0]->blood_group == 'O+' ? 'selected' : '' }}>O +ve</option>
            <option value='O-' {{$indexProfiles[0]->blood_group == 'O-' ? 'selected' : '' }}>O -ve</option>
            <option value='AB+' {{$indexProfiles[0]->blood_group == 'AB+' ? 'selected' : '' }}>AB +ve</option>
            <option value='AB-' {{$indexProfiles[0]->blood_group == 'AB-' ? 'selected' : '' }}>AB -ve</option>
          </select>
          </div>
        </div>
        @endif
        @if($type=='D')
        <div class="form-group row">
          <label for="hospital_name" class="col-md-4 control-label">Hospital Name</label>
          <div class="col-md-8"><input name="hospital_name" id="hospital_name" type="text" class="form-control" maxlength="50" value="{{$indexProfiles[0]->hospital_name}}" required></div>
        </div>
        <div class="form-group row">
          <label for="specialist" class="col-md-4 control-label">Specialist</label>
          <div class="col-md-8"><input name="specialist" id="specialist" type="text" class="form-control" maxlength="50" value="{{$indexProfiles[0]->specialist}}" required></div>
        </div>
        <div class="form-group row">
          <label for="degree" class="col-md-4 control-label">Degree</label>
          <div class="col-md-8"><input name="degree" id="degree" type="text" class="form-control" maxlength="50" value="{{$indexProfiles[0]->degree}}" required></div>
        </div>
        <div class="form-group row">
          <label for="experience" class="col-md-4 control-label">Experience</label>
          <div class="col-md-8"><input name="experience" id="experience" type="number" class="form-control" maxlength="2" value="{{$indexProfiles[0]->experience}}" required></div>
        </div>
        <div class="form-group row">
          <label for="license_number" class="col-md-4 control-label">License Number</label>
          <div class="col-md-8"><input name="license_number" id="license_number" type="text" class="form-control" maxlength="50" value="{{$indexProfiles[0]->license_number}}" required></div>
        </div>
        <div class="form-group row">
          <label for="license_expire" class="col-md-4 control-label">License Expire</label>
          <div class="col-md-8"><input name="license_expire" id="license_expire" type="date" class="form-control" maxlength="10" value="{{$indexProfiles[0]->license_expire}}" required></div>
        </div>
        @endif
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