@extends('adminlte::page')

@section('title', 'PanelAdmin')

@section('content_header')
    <h1>CREAR CATEGORIA</h1>
@stop

@section('content')
    <hr class="mt-3">
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.categories.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre la cátegoria']) !!}

                    @error('name')
                    <span>
                        <strong class="text-danger">{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                {!! Form::submit('Crear categoría', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop