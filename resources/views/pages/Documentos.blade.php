@extends('admin')
@section('titulo', 'Documentacion')
@section('headerpage')
    <section class="content-header">
        <h1 class="colorazul">
            Dashboard
            <small class="colorazul">Documentacion</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Panel de Control</li>
        </ol>
    </section>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="table-responsive">
            <div class="panel panel-default">
                <div class="panel-heading">Documentacion Disponible</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Tamaño Archivo</th>
                            <th>Descargar</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Guía para la Elaboración del Trabajo de Grado EMI - Ing. Sistemas</td>
                            <td>Lic. Msc. Fernando Yañez Romero</td>
                            <td class="text-center">208 Kb</td>
                            <td>
                                <a href="{{url('/storage/Documentacion/GUÍA PARA LA ELABORACIÓN DEL TRABAJO DE GRADO.pdf')}}">Descargar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Perfil Trabajo de Grado</td>
                            <td>Cnl. DIM Julio Cesar Narváez Tamayo</td>
                            <td class="text-center">369 Kb</td>
                            <td>
                                <a href="{{url('/storage/Documentacion/Perfil- Jefe.pptx')}}">Descargar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Metodología de la Investigación</td>
                            <td>Dr. Roberto Hernández Sampieri</td>
                            <td class="text-center">22 Mb</td>
                            <td>
                                <a href="{{url('/storage/Documentacion/SAMPIERI 5ta edicion.pdf')}}">Descargar</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            </div>
    </div>
</div>

@endsection
