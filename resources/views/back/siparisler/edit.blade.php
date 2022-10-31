
@extends('layouts.back.master') 
@section('title','Sipariş Detay')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 col-lg-10 col-lg-offset-2 main">
                <h1 class="sub-header">Sipariş Düzenle</h1>
            
            <form action="{{route('back.siparis.duzenle',['id'=>$data->id])}}"  method="post">
              @csrf

             @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    @if($errors->any()) 
                     <div class="alert alert-danger">
                        @foreach($errors->all() as $e)
                        <li>{{$e}}</li>
                        @endforeach
                      </div>
                    @endif
            <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ad Soyad</label>
                                <input type="text" name="adsoyad" class="form-control" id="exampleInputEmail1" placeholder="Ürün Ad" value="{{old('adsoyad',$data->adsoyad)}}">
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Telefon</label>
                                <input type="text" name="telefon" class="form-control" id="exampleInputEmail1"  value="{{old('telefon',$data->telefon)}}">
                            </div>
                        </div>
                      
                      <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cep Telefonu</label>
                                <input type="text" name="ceptelefonu" class="form-control" id="exampleInputEmail1"  value="{{old('ceptelefonu',$data->ceptelefonu)}}">
                            </div>
                        </div>
                      
                    </div>
                  <div class="row">
                    
                      <div class="col-md-4">
                            <div class="form-group">
                                <label for="adres">Adres</label>
                                <input type="text" name="adres" class="form-control" id="adres"  value="{{old('adres',$data->adres)}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                          <label for="durum">Durum</label>
                          <select name="durum" class="form-control" id="durum">
                               <option value="Sipariş Onaylandı" @if(old('durum',$data->durum)=='Siparis Onaylandı') selected @endif>Sipariş Onaylandı</option>
                               <option value="Ödeme  Onaylandı"  @if(old('durum',$data->durum)=='Ödeme  Onaylandı') selected @endif>Ödeme  Onaylandı</option>
                               <option value="Kargoya Verildi"  @if(old('durum',$data->durum)=='Kargoya Verildi') selected @endif>Kargoya Verildi</option>
                               <option value="Sipariş Tamamlandı" @if(old('durum',$data->durum)=='Sipariş Tamamlandı') selected @endif>Sipariş Tamamlandı</option>
                                <option value="Siparişiniz alındı" @if(old('durum',$data->durum)=='Siparişiniz alındı') selected @endif>Siparişiniz alındı</option>
                          </select>
                        </div>

                  </div>
                    <div class="row mt-2" style="margin-top:20px;">

                        <div class="col-md-12">
                             <button type="submit" class="btn btn-primary form-control">Düzenle</button>
                        </div>
                        
                    </div>

               
                </form>


    
            <h2>Sipariş (SP-{{$data->id}})</h2>
            <table class="table table-hover table-bordered">
                <tr>
                    <th >Ürün</th>
                    <th>Tutar</th>
                    <th>Adet</th>
                    
                    <th>Durum</th>
                </tr>
                @foreach($data->siparisurun as $d)
                <tr>
                    <td > <a href="{{route('front.urun_detay',['slug'=>$d->urunbilgisi->slug])}}" >@if(isset($d->urunbilgisi->images[0]->image)) <img src="{{Storage::url($d->urunbilgisi->images[0]->image)}}" width="50px" height="50px">@endif</a>{{$d->urunbilgisi->urun_adi}} </td>
                    <td>{{$d->tutar}}</td>
                    <td>{{$d->adet}}</td>
                    
                    <td>
                        {{$data->durum}}
                    </td>
                </tr>
                @endforeach
            
                <tr>
                    <th></th>
                    <th></th>
                    <th>Toplam Tutar (KDV Dahil)</th>
                    <th>{{$data->siparis_tutari}}</th>
                    
                </tr>
              
                <tr>
                    <th></th>
                    <th></th>
                    <th>Sipariş Toplamı  </th>
                    <th>{{ round(($data->siparis_tutari)/118*100 ,2)}}</th>
                   
                </tr>

            </table>
   
    </div>
            </div>
@endsection
@section('js')

@endsection