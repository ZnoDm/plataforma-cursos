@extends('adminlte::page')

@section('title', 'PanelAdmin')

@section('content_header')
    <h1>EDITAR PRECIO</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">{{session('info')}}</div>
@endif
    <hr class="mt-3">
    <div class="card">
        <div class="card-body">
            {!! Form::model($price,['route'=>['admin.prices.update',$price],'method'=>'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre de ese precio']) !!}

                    @error('name')
                        <span>
                            <strong class="text-danger">{{$message}}</strong>
                        </span>
                    @enderror

                    <div class="form-group">
                        {!! Form::label('value', 'Valor') !!}
                        {!! Form::number('value', null, ['class'=>'form-control','placeholder'=>'Ingrese el valor de ese precio']) !!}
                        @error('value')
                            <span>
                                <strong class="text-danger">{{$message}}</strong>
                            </span>
                        @enderror
                
                    </div>
                </div>
                {!! Form::submit('Actualizar Precio', ['class'=>'btn btn-primary']) !!}

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