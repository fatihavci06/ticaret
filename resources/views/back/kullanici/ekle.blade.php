
@extends('layouts.back.master') 
@section('title','Kullanıcı Ekle')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 col-lg-10 col-lg-offset-2 main">
                <h1 class="sub-header">Kullanıcı Ekle</h1>
                <form action="{{route('kullanici.ekle')}}" method="post">
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
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{old('email')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Name</label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control" id="address" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Yöneticimi</label>
                                <select class="form-select form-control" name="yoneticimi" aria-label="Default select example">
                                  
                                  <option value="0" @if(old('yoneticimi')==0) selected @endif>Hayır</option>
                                  <option value="1" @if(old('yoneticimi')==1)  selected @endif>Evet</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Aktifmi</label>
                                <select class="form-select form-control" name="isAktive" aria-label="Default select example">
                                  
                                  <option value="0" @if(old('isAktive')==0) selected @endif>Hayır</option>
                                  <option value="1"  @if(old('isAktive')==1) selected @endif>Evet</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                   
                    <button type="submit" class="btn btn-primary form-control">Düzenle</button>
                </form>

               

            </div>
@endsection