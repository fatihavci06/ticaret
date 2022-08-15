<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>E-ticaret</title>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="{{asset('backend/')}}/css/login.css">
</head>

<body>
    <div class="container">

        <form class="form-signin" method="post" action="{{route('back.login')}}">

            @if( @session('mesaj'))
            <div class="alert alert-danger">  {{ @session('mesaj')}}</div>
            @endif
            @csrf
            <img src="{{asset('backend/')}}/img/logo.png" class="logo">
            <label for="email" >Email Adresi</label>


            <input type="email" id="email" name="email" class="form-control @if($errors->has('email')) has-error @endif"  autofocus>
             @if($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('email')}}</strong>
                                    </span>
                                    @endif
            <label for="password" class="mt-2">Şifre</label>
            <input type="password" id="password" name="password" class="form-control mt-2 has-error" >

             @if($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('password')}}</strong>
                                    </span>
                                    @endif
            <button type="submit">Giriş</button>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="rememberme" value="1" checked> Beni Hatırla
                </label>
            </div>
            
            <div class="links">
                <a href="{{route('front.index')}}">Siteye Dön</a>
            </div>
        </form>
    </div>
    <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>

</body>

</html>