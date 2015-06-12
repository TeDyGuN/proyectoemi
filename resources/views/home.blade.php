@extends('admin')
@section('titulo', 'Panel de Control')
@section('headerpage')
    <section class="content-header">
            <h1 class="colorazul">
                SIS|TRAIN
                <small class="colorazul">Inicio</small>
            </h1>
        </section>
@endsection
@section('content')

    <!-- Small boxes (Stat box) -->
    <div class="row">
        @if(Auth::user()->type == 'Admin')
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{count(\App\User::all())}}</h3>
                    <p>Usuarios Registrados</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{route('admin.users.index')}}" class="small-box-footer">Mas Informacion <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{$datos['cTrabajo']}}<sup style="font-size: 20px"></sup></h3>
                  <p>Trabajos Registrados</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{url('sistema/listatrabajos')}}" class="small-box-footer">Mas Informacion <i class="fa fa-arrow-circle-right"></i></a>
              </div>
        </div><!-- ./col -->
        @endif
    </div><!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
    </div><!-- /.row (main row) -->
@endsection