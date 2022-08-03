@extends('layouts.master') 
@section('title','Ödeme')
@section('content')


     <div class="container">
        <div class="bg-content">
            <h2>Siparişler</h2>
            @if(count($siparisler)==0)<p>Henüz siparişiniz yok</p>
            @else
            <table class="table table-bordererd table-hover">
                
                <tr>
                    <th>Sipariş Kodu</th>
                    <th>Toplam Ürün</th>
                    
                    <th>Toplam Tutar</th>
                    <th>Durum</th>
                    <th>DEtay</th>
                    
                </tr>
                @foreach($siparisler as $siparis)
                <tr>
                    <td>SP-{{$siparis->id}}</td>
                    <td>{{$siparis->siparisurun->sum('adet')}}</td>
                    <td>{{$siparis->siparis_tutari}}</td>
                    <td>{{$siparis->durum}}</td>
                    
                    <td><a href="{{route('front.siparis_detay',['id'=>$siparis->id])}}" class="btn btn-sm btn-success">Detay</a></td>
                </tr>
                @endforeach
            </table>
            @endif
        </div>
    </div>


    

@endsection

