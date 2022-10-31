
@extends('layouts.back.master') 

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 col-lg-10 col-lg-offset-2 main">
                <h1 class="page-header">Dashboard</h1>
                
                <section class="row text-center placeholders">




                    <div class="col-6 col-sm-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Bekleyen Sipariş</div>
                            <div class="panel-body">
                                <h4>{{$istatistikler['bekleyen']}}</h4>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Tamamlanan Sipariş</div>
                            <div class="panel-body">
                                <h4>{{$istatistikler['tamamlanan']}}</h4>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Ürün Sayısı</div>
                            <div class="panel-body">
                                <h4>{{$istatistikler['urunsayisi']}}</h4>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Kullanıcı Sayısı</div>
                            <div class="panel-body">
                                <h4>{{$istatistikler['kullanici']}}</h4>
                                
                            </div>
                        </div>
                    </div>
                </section>


        <section class="row text-center placeholders">
             <div class="col-12 col-sm-12 col-lg-6">
                 <div class="panel panel-primary">
                <div class="panel-heading">Çok Satan Ürünler</div>
                <div class="panel-body">
                     <canvas id="myChart" width="400" height="200"></canvas>
                </div>
            </div>
           </div>

           <div class="col-12 col-sm-12 col-lg-6">
                 <div class="panel panel-primary">
                <div class="panel-heading">Çok Satan Ürünler</div>
                <div class="panel-body">
                     <canvas id="myChart2" width="400" height="200"></canvas>
                </div>
            </div>
           </div>
               

                </section>

 

                <!-- Button trigger modal -->
               

               

            </div>
@endsection
@section('js')
<script>
 

 var cData = JSON.parse(`<?php echo $chart_data; ?>`);
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: cData.label,
        datasets: [{
            label: '#Çok Satanlar',
            data: cData.data,
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<script>
 

 var cData2 = JSON.parse(`<?php echo $data2; ?>`);
const ctx2 = document.getElementById('myChart2').getContext('2d');
const myChart2 = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: cData2.label2,
        datasets: [{
            label: '#Çok Satanlar',
            data: cData2.data2,
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
@endsection