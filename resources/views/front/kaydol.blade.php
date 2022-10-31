@extends('layouts.master') 
@section('title','Kaydol')
@section('content')
<div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Kaydol</div>
                    @if($errors->any()) 
                        @foreach($errors->all() as $e)
                        <li>{{$e}}</li>
                        @endforeach
                    @endif
                    <div class="panel-body">
                   
                        <form class="form-horizontal" role="form" method="POST" action="{{route('front.kaydolpost')}}">
                            @csrf
                            <div class="form-group @if($errors->has('adsoyad')) has-error @endif">
                                <label for="adsoyad" class="col-md-4 control-label">Ad ve Soyad</label>
                                <div class="col-md-6">
                                    <input id="adsoyad" type="text" class="form-control" name="adsoyad" value="{{old('adsoyad')}}" required autofocus>
                                    @if($errors->has('adsoyad'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('adsoyad')}}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group @if($errors->has('email')) has-error @endif"">
                                <label for="email" class="col-md-4 control-label">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{old('email')}}" required>
                                    @if($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('email')}}</strong>
                                    </span>
                                    @endif
                               
                                </div>
                            </div>
    
                            <div class="form-group @if($errors->has('sifre')) has-error @endif"">
                                <label for="sifre" class="col-md-4 control-label">Şifre</label>
                                <div class="col-md-6">
                                    <input id="sifre" type="password" class="form-control" name="sifre" required>
                                    @if($errors->has('sifre'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('sifre')}}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group @if($errors->has('sifre')) has-error @endif"">
                                <label for="sifre-tekrar" class="col-md-4 control-label">Şifre (Tekrar)</label>
                                <div class="col-md-6">
                                    <input id="sifre-tekrar" type="password" class="form-control" name="sifre_confirmation" required>
                                    @if($errors->has('sifre'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('sifre')}}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Kaydol
                                    </button>
                                </div>
                            </div>
                            @if(session('mesaj'))
                            <div class="alert alert-success">{{session('mesaj')}}</div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection