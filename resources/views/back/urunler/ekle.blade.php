
@extends('layouts.back.master') 
@section('title','Ürün Ekle')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 col-lg-10 col-lg-offset-2 main">
                <h1 class="sub-header">Ürün Ekle</h1>
                <form action="{{route('urun.ekle')}}" method="post">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </div>
                    @endif
                    @if(session('mesaj'))
                     <div class="alert alert-success">
                        {{session('mesaj')}}
                     </div>
                     @endif
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Urun Adı</label>
                                <input type="text" name="urun_adi" class="form-control" id="exampleInputEmail1" placeholder="Ürün Ad" value="{{old('urun_adi')}}">
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" name="slug" class="form-control" id="exampleInputEmail1"  value="{{old('slug')}}">
                            </div>
                        </div>
                      
                      
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Açıklama</label>
                                <textarea class="form-control" name="aciklama">{{old('aciklama')}}</textarea>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fiyat</label>
                                <input type="number" name="fiyat" class="form-control" id="exampleInputEmail1"  value="{{old('fiyat')}}">
                            </div>
                        </div>
                      
                      
                    </div>
                   
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Kategori Seçiniz</label>
                                <select class="form-select form-control" name="ust_id" aria-label="Default select example">
                                   <option value="0">Seçiniz</option>
                                 
                                  <option value="" ></option>
                                 
                                </select>

                            </div>
                        </div>
                        
                    </div>
                   <div class="row">
                        <div class="col-md-6">
                             <button type="submit" class="btn btn-primary form-control">Ekle</button>
                        </div>
                        
                    </div>
                   
                </form>

               

            </div>
@endsection