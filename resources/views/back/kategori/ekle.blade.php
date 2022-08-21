
@extends('layouts.back.master') 
@section('title','Kategori Ekle')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 col-lg-10 col-lg-offset-2 main">
                <h1 class="sub-header">Kategori Ekle</h1>
                <form action="{{route('kategori.ekle')}}" method="post">
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
                                <label for="exampleInputEmail1">Kategori Adı</label>
                                <input type="text" name="kategori" class="form-control" id="exampleInputEmail1" placeholder="Kategori Ad" value="{{old('kategori')}}">
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
                                <label for="address">Üst Kategori</label>
                                <select class="form-select form-control" name="ust_id" aria-label="Default select example">
                                   <option value="0">Seçiniz</option>
                                  @foreach($ust_kategoriler as $u)
                                  <option value="{{$u->id}}" >{{$u->kategori_adi}}</option>
                                  @endforeach
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