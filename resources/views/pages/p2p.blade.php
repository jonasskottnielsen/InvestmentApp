@extends('layouts.app')
@section('content')

<div class="flex justify-center flex-grow">
        <div class="w-8/12 bg-white p-6 rounded-lg">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                ['Task', 'P2P-Lending'],
                ['Mintos',     45000],
                ['Lenndy',      1000],
                ['Trine',  750],
                ['Lendahand', 700],
                ['Bondora',    15000]
                ]);

                var options = {
                title: 'P2P-Lending',
                pieHole: 0.4,
                };

                var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                chart.draw(data, options);
            }
            </script>
            <div id="donutchart" style="width: 600px; height: 500px;"></div>
        </div>
    </div>
@endsection
