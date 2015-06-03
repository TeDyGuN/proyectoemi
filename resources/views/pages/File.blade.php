@extends('admin')
@section('titulo', 'Nuevo Trabajo')
@section('headerpage')
<section class="content-header" xmlns="http://www.w3.org/1999/html">
        <h1 class="colorazul">
            Dashboard
            <small class="colorazul">Nuevo Trabajo de Investigacion</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Panel de Control</li>
        </ol>
    </section>
@endsection
@section('content')

    <!-- Small boxes (Stat box) -->
    <div class="container-fluid" ng-app="TrabajoApp">
        <div class="row" ng-controller="SearchCrtl">
            <div class="col-md-5 col-md-offset-4">
                <div class="panel panel-default" id="headeremi">
                    <div class="panel-heading text-center ">Registro de Nuevo Trabajo de Investigacion</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Hay problemas con tus Entradas<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" role="form"  action="{{ url('sistema/guardar')  }}"  >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="titulo" class="col-md-4 control-label colorazul">Titulo Trabajo</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                                    </div>
                                </div>
                                 <div class="form-group" >
                                     <label for="tutor" class="col-md-4 control-label colorazul">Tutor</label>
                                     <div class="col-md-6">

                                         <input type="text" class="form-control" id="tutor" name="tutor" required ng-model="searchInput" ng-change="search()">
                                         <div class="col-md-12 list-group" id="lista">
                                            <a href="#" class="list-group-item" ng-repeat="user in users" ng-click="removeTask(user);">
                                                <h4 class="list-group-item-heading" >
                                                    @{{ user.first_name + ' ' + user.last_name }}
                                                </h4>
                                                <p>
                                                    @{{ user.email }}
                                                </p>
                                            </a>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="revisor" class="col-md-4 control-label colorazul">Revisor</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="revisor" name="revisor">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="equipo" class="col-md-4 control-label colorazul">Integrantes</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="equipo" name="equipo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="archivo" class="col-md-4 control-label colorazul">File input</label>
                                    <div class="col-md-6">
                                        <input type="file" name="archivo" id="archivo"/>
                                    </div>
                                    <label for="archivo" class="col-md-4 control-label colorazul">Solo Archivos: .doc .docx .pdf</label>
                                </div>
                                <div class="col-md-6 col-md-offset-5">
                                    <button type="submit" class="col-md-4 btn btn-primary center-block">
                                        Registrar
                                    </button>
                                </div>
                            </form>
                            <br><br>
                            {{$success = Session::get('success')}}
                            @if ($success)
                                <div class="alert alert-success">
                                    <strong>!!Felicidades!!</strong>Registraste tu Trabajo de Investigacion con Exito <br><br>
                                </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('addscripts')
<script type="text/javascript">
'use strict';
    var TrabajoApp = angular.module('TrabajoApp', []);
         TrabajoApp.controller('SearchCrtl', function($scope, $http){
             $scope.search = function() {
                $http.get('find',{
                    params: {nombre: $scope.searchInput}
                }).success(function (data){
                    $scope.users = data;
                });
             };

             $scope.removeTask = function(user){
                 var lista = $('#lista');
                 lista.css({display: "none"});
                 $('#tutor').attr('value', user.first_name +' '+user.last_name);
              };
         });

    /*$('#tutor').blur(function(){
        var lista = $('#lista');
        lista.css({display: "none"});

    });*/
    $('#tutor').click(function(){
        var lista = $('#lista');
        lista.css({display: "block"});

    });
</script>
@endsection