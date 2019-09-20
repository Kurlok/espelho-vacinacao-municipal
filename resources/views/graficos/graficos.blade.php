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
                    <option value="todas">Todas</option>

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
                <button type="button" class="btn btn-success" id="adicionarVacina">Adicionar Vacina</button>
                <button type="button" class="btn btn-danger" id="removerVacina">Remover Vacina</button>
            </div>
        </div>



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

        var ctx = document.getElementById("myBarChart").getContext("2d");
        var myBarChart = new Chart(ctx, {
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

        $('#adicionarVacina').click(function() {
            // $("#LoadMe").show();
            var mes = document.getElementById("mes").value;
            var ano = document.getElementById("ano").value;
            var idVacina = document.getElementById("vacina").value;
            var idUnidade = document.getElementById("unidade").value;

            var url = ('graficos/idVacina/idUnidade/ano/mes').replace('idVacina', idVacina);
            url = url.replace('idUnidade', idUnidade);
            url = url.replace('ano', ano);
            url = url.replace('mes', mes);

            console.log(url);
            $.ajax({
                type: 'POST',
                url: url,
                success: function(response) {
                    console.log(response);
                },
                error: function(response) {
                    console.log(response);
                }
            });

            // You create the new dataset `Vendas` with new data and color to differentiate
            var newDataset = {
                label: "Vendas",
                backgroundColor: getRandomColor(),
                //borderColor: getRandomColor(),
                //borderWidth: 2,
                data: [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120],
            }

            barChartData.datasets.push(newDataset);
            dataDoughnut.datasets.push(newDataset);



            myBarChart.update();
            myDoughnutChart.update();
        });


        $('#removerVacina').click(function() {
            barChartData.datasets.pop();
            dataDoughnut.datasets.pop();
            myBarChart.update();
            myDoughnutChart.update();
        });

        $('#radioMensal').click(function() {
            myBarChart.data.datasets = [];
            myDoughnutChart.data.datasets = [];

            myBarChart.data.labels = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10",
                "11", "12", "13", "14", "15", "16", "17", "18", "19", "20",
                "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"
            ];
            myBarChart.update();
            myDoughnutChart.update();

        });

        $('#radioAnual').click(function() {
            myBarChart.data.datasets = [];
            myDoughnutChart.data.datasets = [];

            myBarChart.data.labels = [
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
            ];
            myBarChart.update();
            myDoughnutChart.update();

        });

        function getRandomRgba() {
            var o = Math.round,
                r = Math.random,
                s = 255;
            return 'rgba(' + o(r() * s) + ',' + o(r() * s) + ',' + o(r() * s) + ')';
        }

        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        comboMeses = document.getElementById('mes');
        comboMeses.onchange = function(e) {
            myBarChart.data.datasets = [];
            myDoughnutChart.data.datasets = [];
            myBarChart.update();
            myDoughnutChart.update();
        }
        comboAnos = document.getElementById('ano');
        comboAnos.onchange = function(e) {
            myBarChart.data.datasets = [];
            myDoughnutChart.data.datasets = [];
            myBarChart.update();
            myDoughnutChart.update();
        }
    </script>

    <div class="carregando" id="loading">
        <!-- <div class="loader"></div> -->

    </div>

    <script>
        $(function() {
            var loading = $("#loading");
            $(document).ajaxStart(function() {
                loading.show();
            });

            $(document).ajaxStop(function() {
                loading.hide();
            });
        });
    </script>

</div>


@endsection