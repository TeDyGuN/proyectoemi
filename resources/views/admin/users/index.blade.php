@extends('admin')
@section('titulo', 'Usuarios Registrados')
@section('headerpage')
    <section class="content-header">
        <h1 class="colorazul">
            SIS|TRAIN
            <small>Usuarios Listado</small>
        </h1>
    </section>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="table-responsive">
            <div class="panel panel-default">
                <div class="panel-heading">Usuarios Registrados</div>
                <div class="panel-body">
                    <h4>Existen {{ $users->total() }} Usuarios</h4>
                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Correo Electronico</th>
                            <th>Tipo Usuario</th>
                            <th>Acciones</th>
                        </tr>
                        @foreach($users as $user)
                            <tr data-id="{{ $user->id }}">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->first_name.' '.$user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->type }}</td>
                                <td>
                                    <a href="" class="btn-delete">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {!! $users->setPath('users'); !!}
                </div>
            </div>

            </div>
    </div>
</div>
<form id="form-delete" role="form" method="POST" action="{{ route('admin.users.destroy', ':USER_ID') }}">

    <input name="_method" type="hidden"  value="DELETE">
    <input name="_token" type="hidden" value="{{ csrf_token() }}">
</form>
@endsection
@section('addscripts')
    <script>
        $('.btn-delete').click(function()
        {
            event.preventDefault();
            var row = $(this).parents('tr');
            var id = row.data('id');
            var form = $('#form-delete');
            var url = form.attr('action').replace(':USER_ID', id);
            var data = form.serialize();
            row.fadeOut();
            $.post(url, data, function(result)
            {
               alert(result);
            }).fail(function()
            {
                alert('El Usuario No fue Eliminado');
                row.show();
            });
        });
    </script>
@endsection