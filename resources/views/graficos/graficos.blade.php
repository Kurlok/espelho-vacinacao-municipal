@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
@endpush

@extends('layouts.app')

@section('content')
<div class="container">
    <div id="top" class="row">
        <div class="col-md-3">
            <h2><i class="fas fa-chart-bar"></i> Gráficos</a></h2>
        </div>
    </div>
    <form action="/usuarios/busca" method="POST" role="search">
    {{ csrf_field() }}
    <div class="col-md-12 ">

        <div class="form-group row">

            <div class="col-md-3">
                <label for="vacina1">Vacina</label>
                <select class="form-control" id="vacina1" name="vacina1">
                    <option disabled selected>Selecione a vacina</option>
                    @foreach($listaVacina as $vacina)
                    <option value="{{$vacina->id}}">{{$vacina->vacina}} - {{$vacina->dose}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="vacina2">Vacina</label>
                <select class="form-control" id="vacina2" name="vacina2">
                    <option disabled selected>Selecione a vacina</option>
                    @foreach($listaVacina as $vacina)
                    <option value="{{$vacina->id}}">{{$vacina->vacina}} - {{$vacina->dose}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="vacina3">Vacina</label>
                <select class="form-control" id="vacina3" name="vacina3">
                    <option disabled selected>Selecione a vacina</option>
                    @foreach($listaVacina as $vacina)
                    <option value="{{$vacina->id}}">{{$vacina->vacina}} - {{$vacina->dose}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="vacina4">Vacina</label>
                <select class="form-control" id="vacina4" name="vacina4">
                    <option disabled selected>Selecione a vacina</option>
                    @foreach($listaVacina as $vacina)
                    <option value="{{$vacina->id}}">{{$vacina->vacina}} - {{$vacina->dose}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">

            <div class="col-md-4">
                <label for="dataInicial">Data Inicial</label>
                <input type="date" class="form-control" id="dataInicial" name="dataInicial">
            </div>
            <div class="col-md-4">
                <label for="dataFinal">Data Final</label>
                <input type="date" class="form-control" id="dataFinal" name="dataFinal">
            </div>
        </div>
    </div>
    <div class="form-group col-md-12 ">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio2">Por mês</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio2">Por ano</label>
        </div>
    </div>

    <div class="col-md-3 ">

        <a href="{{ route('telaCadastroUsuario') }}" class="btn btn-primary pull-right h2"> Gerar</a>
    </div>
</form>

    <canvas id="myChart" width="50vh" height="20vh"></canvas>
    <canvas id="myDoughnutChart" width="50vh" height="20vh"></canvas>

    <script>
        var barChartData = {
            labels: [
                "Janeiro",
                "Fevereiro",
                "Março",
                "Abril",
                "Maio",
                "Junho",
                "Julho",
                "Agosto",
                "Setembro",
                "Outubro",
                "Novembro",
                "Dezembro"
            ],
            datasets: [{
                    label: "Hepatite B - Dose 1",
                    backgroundColor: "pink",
                    borderColor: "red",
                    borderWidth: 1,
                    data: [3, 5, 6, 7, 3, 5, 6, 7]
                },
                {
                    label: "Hepatite B - Dose 2",
                    backgroundColor: "lightblue",
                    borderColor: "blue",
                    borderWidth: 1,
                    data: [4, 7, 3, 6, 10, 7, 4, 6]
                },
                {
                    label: "Hepatite B - Dose 3",
                    backgroundColor: "lightgreen",
                    borderColor: "green",
                    borderWidth: 1,
                    data: [10, 7, 4, 6, 9, 7, 3, 10]
                },
                {
                    label: "Hepatite B - Reforço 1",
                    backgroundColor: "yellow",
                    borderColor: "orange",
                    borderWidth: 1,
                    data: [6, 9, 7, 3, 10, 7, 4, 6]
                }
            ]
        };

        var chartOptions = {
            responsive: true,
            legend: {
                position: "top"
            },
            title: {
                display: true,
                text: "Vacina por período"
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }



        dataDoughnut = {
            datasets: [{
                    label: "Hepatite B (Dose 1)",
                    backgroundColor: [
                        'lightblue',
                        'pink',

                    ],

                    data: [10, 20],
                },
                {
                    backgroundColor: [
                        'lightblue',
                        'pink',

                    ],

                    label: "Hepatite B (Dose 2)",

                    data: [6, 4]
                },
                {
                    backgroundColor: [
                        'lightblue',
                        'pink',

                    ],

                    label: "Hepatite B (Dose 3)",

                    data: [27, 44]
                },
                {
                    backgroundColor: [
                        'lightblue',
                        'pink',

                    ],

                    label: "Hepatite B (Reforço 1)",

                    data: [50, 67]
                }
            ],

            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: [
                'Masculino',
                'Feminino',
            ]
        };

        var optionsDoughnut = {
            responsive: true,
            legend: {
                position: "top",
                display: true

            },
            title: {
                text: "Sexo"
            },
            tooltips: {
                callbacks: {
                    label: function(item, data) {
                        console.log(data.labels, item);
                        return data.datasets[item.datasetIndex].label + " - " + data.labels[item.index] + ": " + data.datasets[item.datasetIndex].data[item.index];
                    }
                }
            },
            rotation: 1 * Math.PI,
            circumference: 1 * Math.PI
        }

        window.onload = function() {
            var ctx = document.getElementById("myChart").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: "bar",
                data: barChartData,
                options: chartOptions
            });

            var ctx2 = document.getElementById("myDoughnutChart").getContext("2d");
            var myDoughnutChart = new Chart(ctx2, {
                type: 'doughnut',
                data: dataDoughnut,
                options: optionsDoughnut
            });
        };

        // new Chart(document.getElementById("myChart"), {
        //     type: 'bar',
        //     data: {
        //         labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
        //         datasets: [{
        //             label: "Population (millions)",
        //             backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
        //             data: [2478, 5267, 734, 784, 433]
        //         }]
        //     },
        //     options: {
        //         legend: {
        //             display: false
        //         },
        //         title: {
        //             display: true,
        //             text: 'Predicted world population (millions) in 2050'
        //         }
        //     }
        // });
    </script>

</div>


@endsection