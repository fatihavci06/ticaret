@extends('layouts.master') 
@section('title','Ürün Detay')
@section('content')

<div class="container">
        <ol class="breadcrumb">
            <li><a href="{{route('front.index')}}">Anasayfa</a></li>
            
            <li><a href="#">Arama Sonucu</a></li>
           
            
        </ol>
       
        <div class="products bg-content">
                    
                    <div class="row">

                        @if(count($urunler)==0)
                        Bu kategoride ürün bulunmuyor.
                        @endif
                        @foreach($urunler as $u)

                         @php
                            $data=\App\Http\Controllers\front\KategoriController::fotocek($u->id);
                            @endphp
                        <div class="col-md-3 product mb-3">
                            <a href="#"><img @if(!empty($data->image)) src="{{Storage::url($data->image)}}"  @endif></a>
                            <p><a href="{{route('front.urun_detay',['slug'=>$u->slug])}}">{!!$u->urun_adi!!}</a></p>
                            <p class="price">{{$u->fiyat}}</p>
                            <p><a href="#" class="btn btn-theme">Sepete Ekle</a></p>
                        </div>
                        @endforeach
                        <div class="col-sm-12"> {{ $urunler->appends(['aranan'=>old('aranan')])->links() }}</div>
                    </div>
                </div>

       
    </div>

@endsection