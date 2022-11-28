@extends('layouts.master')

@section('content')
@include('common.alert')
    <div class="container-fluid">

        
        <div id="char-container">

        </div>


        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script>
            var datas = <?php echo json_encode($datas) ?>

            Highcharts.chart('chart-container', {
                title:{
                    text:'Augmentation "tudiant, 2020'
                },
                subtitle:{
                    text:'Source: Diagui SERVICE '
                },
                xAxis:{
                    categories:['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Aoû', 'Sept', 'Oct', 'Nov', 'Déc']
                },
                yAxis:{
                    title:"Nombre de nouveaux étudiants"
                },
                legend:{
                    layout:'vertical',
                    align:'right',
                    verticalAlign:'middle'
                },
                plotOptions:{
                    series:{
                        allowPointSelect:true
                    }
                },
                series:[{
                    name:'Nouveaux étudiants',
                    data.datas
                }],
                responsive:{
                    rules:[
                        {
                            condition:{
                                maxWidth:500
                            },
                            chartOptions:{
                                legend:{
                                    layout:'horizontal',
                                    align:'center',
                                    verticalAlign:'bottom'
                                }
                            }
                        }
                    ]
                }


            })
        </script>

       
       
    </div>
@endsection
