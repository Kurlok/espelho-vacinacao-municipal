@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
@endpush

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-3">
        <h2><i class="fas fa-chart-bar"></i> Relatórios</a></h2>
    </div>
    <canvas id="myChart" width="50vh" height="20vh"></canvas>
    <script>
        new Chart(document.getElementById("myChart"), {
            type: 'bar',
            data: {
                labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                    data: [2478, 5267, 734, 784, 433]
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Predicted world population (millions) in 2050'
                }
            }
        });
    </script>

</div>
@endsection