@extends('admin')
@section('titulo', 'Nuevo Trabajo')
@section('headerpage')
    <section class="content-header">
        <h1 class="colorazul">
            Dashboard
            <small class="colorazul">Nuevo Trabajo de Investigacion</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Panel de Control</li>
        </ol>
    </section>
@endsection
@section('content')

    <!-- Small boxes (Stat box) -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 col-md-offset-4">
                <div class="panel panel-default" id="headeremi">
                    <div class="panel-heading text-center ">Registro de Nuevo Trabajo de Investigacion</div>
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
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" role="form"  action="{{ url('sistema/guardar')  }}"  >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="titulo" class="col-md-4 control-label colorazul">Titulo Trabajo</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="archivo" class="col-md-4 control-label colorazul">File input</label>
                                    <div class="col-md-6">
                                        <input type="file" name="archivo" id="archivo"/>
                                    </div>
                                    <label for="archivo" class="col-md-4 control-label colorazul">Solo Archivos: .doc .docx .pdf</label>
                                </div>
                                <div class="col-md-6 col-md-offset-5">
                                    <button type="submit" class="col-md-4 btn btn-primary center-block">
                                        Registrar
                                    </button>
                                </div>
                            </form>
                            <br><br>
                            {{$success = Session::get('success')}}
                            @if ($success)
                                <div class="alert alert-success">
                                    <strong>!!Felicidades!!</strong>Registraste tu Trabajo de Investigacion con Exito <br><br>
                                </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
