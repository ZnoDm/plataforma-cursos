@extends('adminlte::page')

@section('title', 'PanelAdmin')

@section('content_header')
    <h1>Welcome!</h1>
@stop

@section('content')
    <p>Biendenido al Panel de Administracion.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop