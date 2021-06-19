@extends('adminlte::page')

@section('title', 'PanelAdmin')

@section('content_header')
    <div class="d-flex">
        <h1 class="mr-auto">LISTA DE PRECIOS</h1>
        <a href="{{route('admin.prices.create')}}" class="btn btn-secondary btn-sm">Crear Precio</a>
    </div>
    
    
@stop

@section('content')
    <hr class="mt-3">

    @if (session('info'))
    <div class="alert alert-success">{{session('info')}}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($prices as $price)
                        <tr>
                            <td>{{$price->id}}</td>
                            <td>{{$price->name}}</td>
                            <td width="10px"> 
                                <a href="{{route('admin.prices.edit',$price)}}" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.prices.destroy',$price)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop