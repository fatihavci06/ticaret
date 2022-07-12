<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}}</title>
</head>
<body>
    <p>{{$kullanici->name}}Kaydınız başarılı bir şekilde gerçekleşmiştir</p>
    Kaydınızı aktifleştirmek için <a href="{{route('front.aktivasyon',['aktivasyon_kodu'=>$kullanici->aktivation_code])}}">tıklayın</a> 
</body>
</html>