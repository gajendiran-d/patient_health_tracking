@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">Monthly Visit Chart</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                            google.charts.load('current', {'packages':['corechart']});
                            google.charts.setOnLoadCallback(drawChart);
                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                ['Month', 'Visit'],
                                ['Jan',  1000],
                                ['Feb',  924],
                                ['Mar',  660],
                                ['Apr',  1678],
                                ['May',  456],
                                ['Jun',  765],
                                ['Jul',  1030],
                                ['Aug',  1852],
                                ['Sep',  852],
                                ['Oct',  1385],
                                ['Nov',  678],
                                ['Dec',  1111],
                                ]);
                                var options = {
                                title: '',
                                curveType: 'function',
                                legend: { position: 'bottom' }
                                };
                                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                                chart.draw(data, options);
                            }
                        </script>
                        <div id="curve_chart" style="height: 420px"></div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection