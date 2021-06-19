<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Correo de Rechazo</h1>
    <p>El curso <strong>{{$course->title}}</strong>  fue aprobado rechazado</p>
    <h2>Motivos</h2>
    {!!$course->observation->body!!}
</body>
</html>