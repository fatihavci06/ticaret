
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

                <!-- Button trigger modal -->
               

               

            </div>
@endsection