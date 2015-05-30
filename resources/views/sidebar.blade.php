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
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Panel Principal</span>
                </a>
            </li>
            <li>
                <a href="{{url('calendar')}}">
                    <i class="fa fa-calendar"></i> <span>Calendario</span>
                    <small class="label pull-right bg-red">3</small>
                </a>
            </li>
            @if(Auth::user()->type == 'Admin')
            <li>
                <a href="{{route('admin.users.index')}}">
                    <i class="fa fa-area-chart"></i> <span>Usuarios Registrados</span>
                </a>
            </li>

            @endif
            <li>
                <a href="{{url('calendar')}}">
                    <i class="fa fa-book"></i> <span>Documentacion</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>