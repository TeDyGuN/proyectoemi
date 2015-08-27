@extends('admin')
@section('titulo', 'Listado de Trabajos Registrados')
@section('headerpage')
    <section class="content-header">
        <h1 class="colorazul">
            SIS|TRAIN
            <small class="colorazul">Mis Trabajos</small>
        </h1>
    </section>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="table-responsive">
            <div class="panel panel-default">
                <div class="panel-heading">Investigaciones para Revisar</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Titulo</th>
                            <th>Tutor</th>
                            <th>Revisor</th>
                            <th>Linea de Investigacion</th>
                            <th>Descargar</th>
                        </tr>
                        @foreach($trabajos as $t)
                        <tr>
                            <td>
                                <a href="{{url('sistema/revision/trabajo/'.$t->id)}}">{{$t->titulo}}</a>

                            </td>
                            <td>{{$t->tutorfirst_name.' '.$t->tutorlast_name}}</td>
                            <td>{{$t->revfirst_name.' '.$t->revlast_name}}</td>
                            <td>{{$t->Categoria}}</td>
                            <td>
                                <a href="{{url('sistema'.$t->rutaArchivo)}}">Descargar</a>
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
