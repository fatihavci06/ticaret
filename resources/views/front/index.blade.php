@extends('layouts.master') 
@section('title','Anasayfa')
@section('content')
@if(session('success')==1)
<div class="container">
        <div class="alert alert-success">
            {{session('mesaj')}}
        </div>
</div>
@endif

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Kategoriler</div>
                    <div class="list-group categories">
                        @foreach($kategoriler as $k)
                        <a href="{{route('front.kategori',['slug'=>$k->slug])}}" class="list-group-item"><i class="fa fa-television"></i> {{$k->kategori_adi}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        
                        @foreach($slider as $s)
                        <li data-target="#carousel-example-generic" data-slide-to="0" @if($slider[0]->id==$s->id) class="active" @endif></li>
                        @endforeach
                        
                    </ol>
                    <div class="carousel-inner" role="listbox">
                    
                    @foreach($slider as $s)
                        <div class="item @if($slider[0]->id==$s->id) active @endif">
                            <img src="http://via.placeholder.com/640x400?text=UrunResmi" alt="...">
                            <div class="carousel-caption">
                                {{$s->urun->urun_adi}}
                            </div>
                        </div>
                    @endforeach 
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default" id="sidebar-product">
                    <div class="panel-heading">{{$gunun_firsati->urun_adi}} - Günün Fırsatı </div>
                   
                    <div class="panel-body">
                        <a href="{{route('front.urun_detay',['slug'=>$gunun_firsati->slug])}}">
                            <img src="http://via.placeholder.com/400x485?text=UrunResmi" class="img-responsive">
                            
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">Öne Çıkan Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($one_cikan as $o)
                        <div class="col-md-3 product">
                            <a href="{{route('front.urun_detay',['slug'=>$o->slug])}}"><img src="http://via.placeholder.com/400x400?text=UrunResmi"></a>
                            <p><a href="{{route('front.urun_detay',['slug'=>$o->slug])}}">{{$o->urun_adi}}</a></p>
                            <p class="price">{{$o->fiyat}} ₺</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">Çok Satan Ürünler</div>
                <div class="panel-body">
                <div class="row">
                        @foreach($cok_satan as $c)
                        <div class="col-md-3 product">
                            <a href="{{route('front.urun_detay',['slug'=>$c->slug])}}"><img src="http://via.placeholder.com/400x400?text=UrunResmi"></a>
                            <p><a href="{{route('front.urun_detay',['slug'=>$c->slug])}}">{{$o->urun_adi}}</a></p>
                            <p class="price">{{$c->fiyat}} ₺</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">İndirimli Ürünler</div>
                <div class="panel-body">
                <div class="row">
                        @foreach($indirimli as $o)
                        <div class="col-md-3 product">
                            <a href="{{route('front.urun_detay',['slug'=>$o->slug])}}"><img src="http://via.placeholder.com/400x400?text=UrunResmi"></a>
                            <p><a href="{{route('front.urun_detay',['slug'=>$o->slug])}}">{{$o->urun_adi}}</a></p>
                            <p class="price">{{$o->fiyat}} ₺</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
<script type="text/javascript">
    setTimeout(function() { $(".alert").slideUp(); }, 5000);
</script>
@endsection