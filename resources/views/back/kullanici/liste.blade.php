
@extends('layouts.back.master') 
@section('title','Kullanıcı listesi')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 col-lg-10 col-lg-offset-2 main">
                <h1 class="page-header">Kullanıcılar</h1>

                
                <!-- Button trigger modal -->
               
                 
                @if(session('mesaj'))
                     <div class="alert alert-danger">
                        {{session('mesaj')}}
                     </div>
                     @endif
                @if(!empty($sayi))
                     <div class="alert alert-danger">
                        {{$sayi}}
                     </div>
                     @endif
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-lg-8">
                            <form action="{{route('kullanici.ara')}}" method="get">
                                
                            <input type="text" name="ara" placeholder="Ara">
                           <button type="submit" class="btn btn-primary">Ara</button>
                           </form>
                        </div>
                         
                        <div class="col-lg-4 text-right">
                                <a href="{{route('kullanici.ekle.form')}}" style="margin-bottom: 22px;"  class="btn btn-primary ">Ekle</a>
                
                        </div>
                    </div>
                    
                    
                    <table class="table table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Ad Soyad</th>
                                <th>Email</th>
                                <th>Aktifmi</th>
                                <th>Yöneticimi</th>
                                <th>Kayıt Tarihi</th>
                                <th>İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                            <tr>
                                <td>{{$d->id}}</td>
                                <td>{{$d->name}}</td>
                                <td>{{$d->email}}</td>
                                <td>@if($d->isAktive==1) Aktif @else Pasif @endif</td>
                                <td>@if($d->yoneticimi==1) Evet @else Hayır @endif</td>
                                <td>{{$d->created_at}}</td>
                                <td style="width: 100px">
                                    <a href="{{route('kullanici.edit',['id'=>$d->id])}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                        <span class="fa fa-pencil"></span>
                                    </a>
                                    <a href="{{route('kullanici.sil',['id'=>$d->id])}}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onclick="return confirm('Are you sure?')">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                     <div class="col-sm-12"> 
                        @if(request()->has('ara')) 
                         {{ $data->appends(['ara'=>request()->get('ara')])->links() }} 
                        @else
                        {{ $data->links() }}
                        @endif

                      </div>
                </div>

               

            </div>
@endsection