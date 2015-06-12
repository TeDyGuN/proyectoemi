@extends('admin')
@section('titulo', 'Reportes')
@section('headerpage')
    <section class="content-header">
        <h1 class="colorazul">
            SIS|TRAIN
            <small>Reportes</small>
        </h1>
    </section>
@endsection
@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="container-fluid">
        <div class="row" >
            <div class="col-md-5 col-md-offset-4">
                <div class="panel panel-default" id="headeremi">
                    <div class="panel-heading text-center ">Formulario de Reporte</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Hay problemas con tus Entradas<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <form method="post" class="form-horizontal" role="form" enctype="multipart/form-data" action="{{ url('admin/reportes/guardar')  }}"  >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="tabla" class="col-md-4 control-label colorazul letragrande">Tabla</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="tabla" id="select">
                                            <option value="1">Usuarios Registrados</option>
                                            <option value="2">Trabajos Registrados</option>
                                            <option value="3">Lineas de Investigacion</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ord" class="col-md-4 control-label colorazul letragrande">Ordenacion</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="ord">
                                            <option value="1">ID</option>
                                            <option value="2">Nombre o Titulo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8 col-md-offset-5">
                                    <button type="submit" class="col-md-4 btn btn-primary center-block">
                                        Generar Reporte
                                    </button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
