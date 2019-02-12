@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">BMI Calculator</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="form-horizontal" method="POST" action="{{url('bmiCalculator')}}" >
                            @csrf 
                            <div class="form-group row">
                              <label for="measuring" class="col-md-4 control-label">Measuring System</label>
                              <div class="col-md-8"><select id="msm" onchange="msystem();" class="form-control">
                                    <option value="metric">Metric (Kgs, Cms)</option>
                                    <option value="us">US (lbs, inches)</option>
                                    </select></div>
                            </div>
                            <div class="form-group row">
                                <label for="height" class="col-md-4 control-label">Height <span id="thm">(Cms)</span></label>
                                <div class="col-md-8"><input name="hm" id="hm" type="text" class="form-control" value="" required></div>
                            </div>
                            <div class="form-group row">
                                <label for="weight" class="col-md-4 control-label">Weight <span id="twm">(Kgs)</span></label>
                                <div class="col-md-8"><input name="wm" id="wm" type="text" class="form-control" value="" required></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">&nbsp;</div>
                                <div class="col-md-8 text-md-right"><button type="reset" class="btn btn-danger" >Reset</button>&nbsp;&nbsp;
                                <button type="button" class="btn btn-primary" onclick='bmass();' >Submit</button></div>
                            </div>
                            <script>
                                function msystem() {
                                    if (document.getElementById('msm').value == 'metric') {
                                        document.getElementById('thm').innerHTML = ' (Cms)';
                                        document.getElementById('twm').innerHTML = ' (Kgs)';
                                    } else {
                                        document.getElementById('thm').innerHTML = ' (inches)';
                                        document.getElementById('twm').innerHTML = ' (lbs)';
                                    };
                                }
                                function bmass() {
                                    var ms = document.getElementById('msm').value;
                                    var height = document.getElementById('hm').value;
                                    var weight = document.getElementById('wm').value;
                                    if (height == null || height.length == 0 || weight == null || weight.length == 0) {
                                        document.getElementById('bmi').value = "Please enter height and weight.";
                                    } else {
                                        document.getElementById('bmi').value = "";
                                    }
                                    if (ms == 'metric' && height > 0) {
                                        document.getElementById('bmi').value = Math.round(weight / (height * height / 10000) * 100) / 100 + " kg/m2 "
                                    } else if (ms == 'us' && height > 0) {
                                        document.getElementById('bmi').value = Math.round(703 * weight / (height * height) * 100) / 100 + " kg/m2 "
                                    }
                                } 
                            </script>
                            <div class="form-group row">
                                <label for="bmi" class="col-md-4 control-labe"><b class="text-success">Body Mass Index (BMI)</b></label>
                                <div class="col-md-8"><input name="bmi" id="bmi" type="text" class="form-control" readonly value=""></div>
                            </div>
                            <div class="form-group row">
                                <label for="range" class="col-md-4 control-label"><b class="text-info">Normal BMI range</b></label>
                                <div class="col-md-8"><input name="nbmi" id="nbmi" type="text" class="form-control" readonly value="18.5 - 25 kg/m2"></div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection