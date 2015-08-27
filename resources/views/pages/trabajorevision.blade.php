@extends('admin')
@section('titulo', 'Perfil del Trabajo de Investigacion')
@section('headerpage')
    <section class="content-header">
        <h1 class="colorazul">
            SIS|TRAIN
            <small class="colorazul">Formulario de Revision de Trabajo</small>
        </h1>
    </section>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title" style="text-align: center">{{ $trabajos[0]->titulo  }}</h3>
              </div>
              <div class="panel-body">
                    <div class="col-md-8 col-ls-8">
                        <label class="col-md-4 col-ls-4 control-label colorazul" style="font-size: 1.2em">Linea de Investigacion:</label>
                        <label class="col-md-4 col-ls-4 control-label" style="font-size: 1.2em">{{ $trabajos[0]->Categoria  }}</label>
                    </div>
                    <div class="col-md-8 col-ls-8">
                        <label class="col-md-4  col-ls-4 control-label colorazul" style="font-size: 1.2em">Tutor:</label>
                        <label class="col-md-4 col-ls-4 control-label" style="font-size: 1.2em">{{ $trabajos[0]->tutorfirst_name.' '.$trabajos[0]->tutorlast_name  }}</label>
                    </div>
                    <div class="col-md-8 col-ls-8">
                        <label class="col-md-4  col-ls-4 control-label colorazul" style="font-size: 1.2em">Correo Electronico Tutor:</label>
                        <label class="col-md-4 col-ls-4 control-label" style="font-size: 1.2em">{{ $trabajos[0]->tutoremail  }}</label>
                    </div>
                    <div class="col-md-8 col-ls-8">
                        <label class="col-md-4  col-ls-4 control-label colorazul" style="font-size: 1.2em">Revisor:</label>
                        <label class="col-md-4 col-ls-4 control-label" style="font-size: 1.2em">{{ $trabajos[0]->revfirst_name.' '.$trabajos[0]->revlast_name  }}</label>
                    </div>
                    <div class="col-md-8 col-ls-8">
                        <label class="col-md-4  col-ls-4 control-label colorazul" style="font-size: 1.2em">Correo Electronico Revisor:</label>
                        <label class="col-md-4 col-ls-4 control-label" style="font-size: 1.2em">{{ $trabajos[0]->revemail  }}</label>
                    </div>
                    <div class="col-md-8 col-ls-8">
                        <label class="col-md-4  col-ls-4 control-label colorazul" style="font-size: 1.2em">Descripcion:</label>
                        <label class="col-md-4 col-ls-4 control-label" style="font-size: 1.2em">{{ $trabajos[0]->Descripcion}}</label>
                    </div>
                    <div class="col-md-8 col-ls-8">
                        <label class="col-md-4  col-ls-4 control-label colorazul" style="font-size: 1.2em">Descargar:</label>
                        <label class="col-md-4 col-ls-4 control-label">
                            <a href="{{url('sistema'.$trabajos[0]->rutaArchivo)}}">Descargar</a>
                        </label>
                    </div>
              </div>

              <div class="panel-heading" style="text-align: center">Formulario de Revision</div><br/><br/>
              <div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Existen Problemas con tus Entradas.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('sistema/revision/guardar') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="col-md-4 control-label colorazul">Tipo de Comentario</label>
                            <div class="col-md-6">
                                <select class="form-control" name="des">
                                    <option value="1">Falta Demasiado</option>
                                    <option value="2">Puede Mejorar</option>
                                    <option value="3">Aceptable</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="trabajo_id" value="{{ $trabajos[0]->id  }}"/>
                        <input type="hidden" name="usuario_id" value="{{$trabajos[0]->usuarioid}}"/>
                        <div class="form-group">
                            <label class="col-md-4 control-label colorazul">Comentario</label>
                            <div class="col-md-6">
                                 <textarea class="form-control" name="texto" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-5">
                                <button type="submit" class="col-md-4 btn btn-primary center-block">
                                    Registrar Revision
                                </button>
                            </div>
                        </div>
                    </form>
              </div>
         </div>
    </div>
</div>
@endsection