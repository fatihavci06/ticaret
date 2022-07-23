@extends('layouts.master') 
@section('title','Ürün Detay')
@section('content')

<div class="container">
        <ol class="breadcrumb">
            <li><a href="{{route('front.index')}}">Anasayfa</a></li>
            @foreach($urun->kategoriler as $ur)
            <li><a href="#">{{$ur->kategori_adi}}</a></li>
            @endforeach
            
        </ol>
        <div class="bg-content">
            <div class="row">
                <div class="col-md-5">
                    <img src="http://via.placeholder.com/400x200?text=UrunResmi">
                    <hr>
                    <div class="row">
                        <div class="col-xs-3">
                            <a href="#" class="thumbnail"><img src="http://via.placeholder.com/400x400?text=UrunResmi"></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="#" class="thumbnail"><img src="http://via.placeholder.com/400x400?text=UrunResmi2"></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="#" class="thumbnail"><img src="http://via.placeholder.com/400x400?text=UrunResmi"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <h1>{{$urun->urun_adi}}</h1>
                    <p class="price">{{$urun->fiyat}} ₺</p>
                    <form action="{{route('front.sepete_ekle')}}" method="post">
                        @csrf 
                        <input type="hidden" name="id" value="{{$urun->id}}">
                        <input type="submit"  class="btn btn-theme" value="Sepete Ekle">
                    </form>
                </p>
                </div>
            </div>

            <div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#t1" data-toggle="tab">Ürün Açıklaması</a></li>
                    <li role="presentation"><a href="#t2" data-toggle="tab">Yorumlar</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="t1">{{$urun->aciklama}}</div>
                    <div role="tabpanel" class="tab-pane" id="t2">t2</div>
                </div>
            </div>

        </div>
    </div>

@endsection