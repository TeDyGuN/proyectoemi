@extends('admin')
@section('titulo', 'Nueva Linea de Investigacion')
@section('headerpage')
    <section class="content-header">
        <h1 class="colorazul">
            SIS|TRAIN
            <small>Nueva Linea de Investigacion</small>
        </h1>
    </section>
@endsection

@section('content')

    <!-- Small boxes (Stat box) -->
    <div class="container-fluid">
        <div class="row" >
            <div class="col-md-5 col-md-offset-4">
                <div class="panel panel-default" id="headeremi">
                    <div class="panel-heading text-center " style="font-size: 1.3em">Registro de Nuevo Trabajo de Investigacion</div>
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
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" role="form"  action="{{ url('admin/guardar')  }}"  >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="titulo" class="col-md-4 control-label colorazul letragrande">Titulo Linea Investigacion</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="equipo" class="col-md-4 control-label colorazul">Descripcion</label>
                                    <div class="col-md-6">
                                        <textarea name="descripcion" class="form-control" rows="3" required></textarea>
                                    </div>
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
                                    <strong>!!Felicidades!!</strong>Registraste la Linea de Investigacion con Exito <br><br>
                                </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection