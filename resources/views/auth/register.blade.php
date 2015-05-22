@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-5 col-md-offset-4">
			<div class="panel panel-default" id="headeremi">
				<div class="panel-heading text-center ">Registro de Nuevo Usuario</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label colorazul">Nombres</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
							</div>
						</div>
                        <div class="form-group">
                            <label class="col-md-4 control-label colorazul">Apellidos</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
                            </div>
                        </div>

						<div class="form-group">
							<label class="col-md-4 control-label colorazul">Correo Electronico</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label colorazul">Contraseña</label>
							<div class="col-md-3">
								<input type="password" class="form-control" name="password">
							</div>
                            <label class="col-md-3 coloramarillo">Maximo 6 Caracteres</label>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label colorazul">Confirmar Contraseña</label>
							<div class="col-md-3">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
                            <label class="col-md-3 coloramarillo">Repita su Contraseña</label>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-5">
								<button type="submit" class="col-md-4 btn btn-primary center-block">
									Registrar
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
