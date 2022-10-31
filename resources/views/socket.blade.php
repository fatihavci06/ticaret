<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
s
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>
<script>
    var socket = io('http://188.166.43.102:5000/:5000');

// socket'te ki posts event'ını dinliyoruz, gelirse konsola yazdırıp bakacağız
socket.on('posts', function (data) {
    console.log(data);
});

// eğer client tarafından socket'in posts event'ına daha göndermek isteseydik yine emit'i kullanacaktık
socket.emit('posts', {
    'id': 5,
    'title': 'Test',
    'content': 'bu bir tesstir',
    'date': '2019-08-11 12:00:00'
});
</script>

</html>
