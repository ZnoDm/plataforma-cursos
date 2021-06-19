@extends('adminlte::page')

@section('title', 'PanelAdmin')

@section('content_header')
    <h1>Cursos pendientes de Aprobacion</h1>
@stop

@section('content')
    <hr class="mt-3">
    @if (session('info'))
        <div class="alert alert-success mt-2" x-data="{open:true}" x-show="open">
            {{session('info')}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table tablle-stripped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Categoria</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->title}}</td>
                            <td>{{$course->category->name}}</td>
                            <td><a href="{{route('admin.courses.show',$course)}}" class="btn btn-primary">Revisar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="card-footer">
            {{$courses->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop