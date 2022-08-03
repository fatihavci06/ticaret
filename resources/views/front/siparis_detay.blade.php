@extends('layouts.master') 
@section('title','Sipariş Detay')
@section('content')


 <div class="container">
        <div class="bg-content">
            <h2>Sipariş (SP-{{$siparis_id}})</h2>
            <table class="table table-bordererd table-hover">
                <tr>
                    <th>Ürün</th>
                    <th>Tutar</th>
                    <th>Adet</th>
                    
                    <th>Durum</th>
                </tr>
                @foreach($data as $d)
                <tr>
                    <td> <a href="{{route('front.urun_detay',['slug'=>$d->urunbilgisi->slug])}}" > <img src="http://via.placeholder.com/120x100?text=UrunResmi"></a>{{$d->urunbilgisi->urun_adi}} </td>
                    <td>{{$d->tutar}}</td>
                    <td>{{$d->adet}}</td>
                    
                    <td>
                        {{$d->durum}}
                    </td>
                </tr>
                @endforeach
            
                <tr>
                    <th></th>
                    <th></th>
                    <th>Toplam Tutar (KDV Dahil)</th>
                    <th>{{$siparis_tutari->siparis_tutari}}</th>
                    <th></th>
                </tr>
              
                <tr>
                    <th></th>
                    <th></th>
                    <th>Sipariş Toplamı  </th>
                    <th>{{ round(($siparis_tutari->siparis_tutari)/118*100 ,2)}}</th>
                    <th></th>
                </tr>

            </table>
        </div>
    </div>



    

@endsection

