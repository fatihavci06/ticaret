<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Eticaret')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300,400,700,800">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('Frontend/')}}/css/app.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body id="commerce">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('front.index')}}">
                    <img src="{{asset('Frontend/')}}/img/logo.png">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <form class="navbar-form navbar-left" method="post" action="{{route('front.arama')}}" >
                    @csrf
                    <div class="input-group">
                        <input type="text" id="navbar-search" name="aranan" class="form-control" value="{{old('aranan')}}" placeholder="Ara">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('front.sepet')}}"><i class="fa fa-shopping-cart"></i> Sepet <span class="badge badge-theme">{{Cart::count()}}</span></a></li>
                    @guest
                    <li><a href="{{route('login')}}">Oturum Aç</a></li>
                    <li><a href="{{route('front.kaydol')}}">Kaydol</a></li>
                    @endguest
                    @auth
                    <li class="dropdown text-center">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Profil <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('front.siparisler')}}">Siparişlerim</a></li>
                            <li role="separator" class="divider"></li>
                            <form action="logout" method="post" >@csrf<li><button class="d-inline btn btn-link p-0">Çıkış</button></li></form>
                        </ul>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>