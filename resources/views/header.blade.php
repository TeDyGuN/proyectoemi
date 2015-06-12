<header class="main-header">
    <!-- Logo -->
    <a href="{{url('home')}}" class="logo"><b>SIS|TRAIN</b></a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->

                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">{{$datos['cCalendar']}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Tienes {{$datos['cCalendar']}} tareas</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul>
                                @foreach($eventos as $fechas)
                                <li>
                                    <p>{{$fechas->titulo_evento}}</p>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="{{url('calendar')}}">Ver todos tus Eventos</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('dist/img/user2-160x160.png') }}" class="user-image" alt="User Image"/>
                        <span class="hidden-xs">{{  Auth::user()->first_name.' '.Auth::user()->last_name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <div class="form-group">
                            <div class="col-md-2">
                                <li><a href="{{ url('/auth/logout') }}">Salir</a></li>
                            </div>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>