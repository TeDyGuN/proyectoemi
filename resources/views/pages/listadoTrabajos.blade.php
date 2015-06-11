@extends('admin')
@section('titulo', 'Listado de Trabajos Registrados')
@section('headerpage')
    <section class="content-header">
        <h1 class="colorazul">
            SIS|TRAIN
            <small class="colorazul">Listado de Trabajos Registrados</small>
        </h1>
    </section>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="table-responsive">
            <div class="panel panel-default">
                <div class="panel-heading">Trabajos de Investigacion Registrados</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Correo Electronico</th>
                            <th>Descripcion</th>
                            <th>Descargar</th>
                        </tr>
                        @foreach($result as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->titulo }}</td>
                                <td>{{ $user->first_name.' '.$user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->Descripcion }}</td>
                                <td>
                                    <a href="{{url('sistema'.$user->rutaArchivo)}}">Descargar</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>

            </div>
    </div>
</div>

@endsection
