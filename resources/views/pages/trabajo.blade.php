@extends('admin')
@section('titulo', 'Perfil del Trabajo de Investigacion')
@section('headerpage')
    <section class="content-header">
        <h1 class="colorazul">
            SIS|TRAIN
            <small class="colorazul">Formulario de Trabajo</small>
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
              <div class="panel-heading">
                <h3 class="panel-title" style="text-align: center">Tablero de Observaciones</h3>
              </div>

              <div class="panel-body">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-body table-responsive no-padding">
                      <table class="table table-hover">
                        <tr>
                          <th>Id</th>
                          <th>Nombre Revisor</th>
                          <th>Observacion</th>
                          <th>Estatus</th>
                        </tr>
                        @foreach($revision as $f)
                            <tr>
                              <td>{{$f->id}}</td>
                              <td>{{ $f->first_name.' '.$f->last_name }}</td>
                              <td>{{ $f->reco }}</td>
                              @if( $f->status === 1)

                                <td><span class="label label-danger">Falta Mucho</span></td>
                               @elseif( $f->status === 2)
                                <td><span class="label label-warning">Falta</span></td>
                                @else

                                <td><span class="label label-success">Aceptable</span></td>
                              @endif
                            </tr>
                        @endforeach
                      </table>
                    </div><!-- /.box-body -->
                  </div><!-- /.box -->
                </div>

              </div>

         </div>
    </div>
</div>

@endsection
