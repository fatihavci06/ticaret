@extends('layouts.master') 
@section('title',$kategoriadi)
@section('content')
@php
    $anakategori_slug=Request::segment(2)
@endphp
<div class="container">
         <ol class="breadcrumb">
            <li><a href="{{route('front.index')}}">Anasayfa</a></li>
            <li><a href="{{route('front.kategori',['slug_kategori'=>$anakategori_slug])}}">{{$anakategori}}</a></li>
            <li class="active">{{$kategoriadi}}</li>
        </ol>
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$kategoriadi}}</div>
                    @if(count($altkategoriler)>0)
                    <div class="panel-body">
                        
                        <h3>Alt Kategoriler {{$anakategori}}</h3>
                        <div class="list-group categories">
                            @foreach($altkategoriler as $a)
                            <a href="{{route('front.kategori',['slug_kategori'=>$anakategori_slug,'slug_altkategori'=>$a->slug])}}" class="list-group-item"><i class="fa fa-arrow-circle-right"></i> {{$a->kategori_adi}}</a>
                            @endforeach
                            
                        </div>
                        
                        
                       
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-md-9">
                <div class="products bg-content">
                    Sırala
                    <a href="#" class="btn btn-default">Çok Satanlar</a>
                    <a href="#" class="btn btn-default">Yeni Ürünler</a>
                    <hr>
                    <div class="row">
                        @if(count($urunler)==0)
                        Bu kategoride ürün bulunmuyor.
                        @endif
                        @foreach($urunler as $u)
                        <div class="col-md-3 product">
                            <a href="#"><img src="http://via.placeholder.com/400x400?text=UrunResmi"></a>
                            <p><a href="{{route('front.urun_detay',['slug'=>$u->slug])}}">{!!$u->urun_adi!!}</a></p>
                            <p class="price">{{$u->fiyat}}</p>
                            <p><a href="#" class="btn btn-theme">Sepete Ekle</a></p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection