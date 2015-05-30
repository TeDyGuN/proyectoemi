@extends('admin')
@section('titulo', 'Panel de Control')
@section('headerpage')
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Panel de Control</li>
        </ol>
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
        @endif
    </div><!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
    </div><!-- /.row (main row) -->
@endsection