@extends('app')
@section('titulo', 'Registro y Control Trabajos de Investigacion EMI')
@section('descripcion' ,'Pagina Web para Registro y Control de Trabajos de Investigacion en la EMI')
@section('content')
    <header id="headeremi">
        <div class="row">
            <div class="hidden-xs col-sm-2 col-md-2 col-lg-2">
                <img id="imglogo" src="images/logo_emi.png" class="img-responsive"/>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 text-center">
                <h1>
                    Sistema de Registro y Control de Trabajos de Investigacion
                </h1>
            </div>
            <div class="hidden-xs col-sm-2 col-md-2 col-lg-2">
                <img id="imgsis" src="images/logo_sistemas.png" class="img-responsive"/>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">EMI</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#" class="glyphicon glyphicon-home">Inicio</a></li>
                    <li><a href="#" class="glyphicon glyphicon-book">Recursos</a></li>
                    <li><a href="#" class="glyphicon glyphicon-question-sign">F.A.Q</a></li>
                </ul>
                @if(Auth::guest())
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown" role="button" aria-expanded="false">Ingresar <span class="caret"></span></a>

                            <ul class="dropdown-menu" role="menu">
                                <form class="navbar-form navbar-right" role="form" method="POST" action="{{ url('/auth/login') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <input type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <input type="password"  placeholder="Contraseña" class="form-control" name="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember">Recuerdame
                                                </label>
                                            </div>

                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                        <a class="btn btn-link" href="{{ url('/password/email') }}">Olvidaste tu Contraseña?</a>
                                    </div>
                                </form>
                                </ul>
                            </li>
                        <li><a href="#" class="glyphicon glyphicon-list-alt">Registrarse</a></li>
                        </ul>
                @else
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                    </ul>
                @endif
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
@endsection