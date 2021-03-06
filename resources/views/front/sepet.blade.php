@extends('layouts.master') 
@section('title','Ürün Detay')
@section('content')
@if(session('sepet')!='')
<div class="container">
        <div class="alert alert-success">
            {{session('sepet')}}
        </div>
</div>
@endif
<div class="container">
        <div class="bg-content">
            <h2>Sepet</h2>
            @if(count(Cart::content())>0)
            <table class="table table-bordererd table-hover">
                <tr>
                    <th >Ürün</th>
                    <th>Adet Tutarı</th>
                    <th>Adet</th>
                    <th>Tutar</th>
                    <th>İşlem</th>
                </tr>
                @foreach($sepet as $s)
                <tr>
                
                    <td> <img src="http://via.placeholder.com/120x100?text=UrunResmi"> <a href="{{route('front.urun_detay',['slug'=>$s->options->slug])}}">{{$s->name}}</a></td>
                    <td>{{$s->price}}</td>
                    <td>
                        <a href="#" class="btn btn-xs btn-default">-</a>
                        <span style="padding: 10px 20px">{{$s->qty}}</span>
                        <a href="#" class="btn btn-xs btn-default">+</a>
                    </td>
                    <td>{{$s->subtotal}}</td>
                    <td>
                        <form action="{{route('front.sepet_kaldir',['rowID'=>$s->rowId])}}" method="post">
                            @csrf
                            <input type="submit" class="btn btn-danger btn-xs" value="Sil">
                        </form>
                        
                    </td>
                </tr>
                @endforeach
                
                <tr>
                    <th></th>
                    <th></th>
                    <th>Toplam Tutar (KDV Hariç)</th>
                    <th>{{Cart::subtotal()}}</th>
                    <th></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th>KDV</th>
                    <th>{{Cart::tax()}}</th>
                    <th></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Toplam Tutar (KDV Dahil)</th>
                    <th>{{Cart::total()}}</th>
                    <th></th>
                </tr>
            </table>
            <div>
                
                <form action="{{route('front.sepet_bosalt')}}" method="post">
                    @csrf
                    <input type="submit" class="btn btn-info pull-left" value="Sepeti Boşalt">
                </form>
                <a href="#" class="btn btn-success pull-right btn-lg">Ödeme Yap</a>
            </div>
            @else
                <p>Sepetinizde ürün yok</p>
            @endif
            
        </div>
    </div>

    

    

@endsection