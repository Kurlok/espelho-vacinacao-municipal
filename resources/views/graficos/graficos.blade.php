@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>

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
            <div class="form-group row">
            <legend class="col-form-label col-md-1" style="padding-top: 5px">Período:</legend>
                    <div class="col-md-2" style="padding-top: 5px">
                        <div class="form-check form-check-inline ">
                            <input class="form-check-input " style="padding-top: 50%" type="radio" name="periodoRadios" id="radioMensal" value="mensal">
                            <label class="form-check-label" for="radioMensal">Mensal</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="periodoRadios" id="radioAnual" value="anual">
                            <label class="form-check-label" for="radioAnual">Anual</label>
                        </div>
                    </div>
                <div class="col-md-2">
                    <select class="form-control" id="mes" name="mes">
                        <option disabled selected>Mês</option>
                        <option value="01">Janeiro</option>
                        <option value="02">Fevereiro</option>
                        <option value="03">Março</option>
                        <option value="04">Abril</option>
                        <option value="05">Maio</option>
                        <option value="06">Junho</option>
                        <option value="07">Julho</option>
                        <option value="08">Agosto</option>
                        <option value="09">Setembro</option>
                        <option value="10">Outubro</option>
                        <option value="11">Novembro</option>
                        <option value="12">Dezembro</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-control" id="ano" name="ano">
                        <option disabled selected>Ano</option>
                        @for ($ano = Carbon\Carbon::now()->year; $ano >= 1970; $ano--)
                        <option value="{{$ano}}">{{$ano}}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-control" id="unidade" name="unidade">
                        <option disabled selected>Unidade</option>
                        <option value="">Todas</option>

                        @foreach($listaUnidades as $unidade)
                        <option value="{{$unidade->id}}">{{$unidade->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-control" id="vacina" name="vacina">
                        <option disabled selected>Vacina</option>
                        @foreach($listaVacinas as $vacina)
                        <option value="{{$vacina->id}}">{{$vacina->vacina}} - {{$vacina->dose}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                
                <div class="colform-group">
                    <button type="button" class="btn btn-primary">Gerar</button>
                    <button type="button" class="btn btn-success">Adicionar Vacina</button>
                    <button type="button" class="btn btn-danger">Remover Vacina</button>
                </div>
            </div>


    </form>

    <canvas id="myBarChart" width="50vh" height="20vh"></canvas>
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
                },
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
                text: "Sexo",
                display: true
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


        $('#button').click(function() {
            // You create the new dataset `Vendas` with new data and color to differentiate
            var newDataset = {
                label: "Vendas",
                backgroundColor: 'rgba(99, 255, 132, 0.2)',
                borderColor: 'rgba(99, 255, 132, 1)',
                borderWidth: 1,
                data: [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120],
            }

            // You add the newly created dataset to the list of `data`
            barChartData.datasets.push(newDataset);

            // You update the chart to take into account the new dataset
            myBarChart.update();
        });

        window.onload = function() {
            var ctx = document.getElementById("myBarChart").getContext("2d");
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




        // new Chart(document.getElementById("myBarChart"), {
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