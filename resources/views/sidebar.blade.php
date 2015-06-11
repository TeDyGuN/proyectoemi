<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dist/img/user2-160x160.png') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Navegacion Principal</li>
            <li class="active treeview">
                <a href="{{ url('home') }}">
                    <i class="fa fa-dashboard"></i> <span>Panel Principal</span>

                </a>
            </li>
            <li>
                <a href="{{url('calendar')}}">
                    <i class="fa fa-calendar"></i> <span>Calendario</span>
                    <small class="label pull-right bg-red">3</small>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-word-o"></i> <span>Trabajo de Investigacion</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                     <li><a href="{{url('sistema/nuevotrabajo')}}"><i class="fa fa-circle-o"></i>Nuevo Trabajo</a></li>
                     <li><a href="{{url('sistema/listatrabajos')}}"><i class="fa fa-circle-o"></i>Lista Trabajo</a></li>
                </ul>
            </li>
            @if(Auth::user()->type == 'Admin')
            <li>
                <a href="{{route('admin.users.index')}}">
                    <i class="fa fa-area-chart"></i> <span>Usuarios Registrados</span>
                </a>
            </li>
            <li>
                <a href="{{url('admin/nuevalinea')}}">
                    <i class="fa fa-plus-square"></i> <span>Nueva Linea de Investigacion</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa fa-area-chart"></i><span>Reportes</span>
                </a>
            </li>
            @endif
            <li>
                <a href="{{url('sistema/documentacion')}}">
                    <i class="fa fa-book"></i> <span>Documentacion</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>