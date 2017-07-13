
@extends('layout.task')

@section('title', 'Gerenciar de Tarefas')

@section('content')

<div class="container">
    <div class="section" ng-controller="taskController">


        <div class="row">
            <div class="input-field">
                <input id="search" type="search" ng-model="filtro" required>
                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <a class="btn-floating btn-large orange right waves-effect waves-light btn" ng-click="add()"><i class="material-icons">add</i></a>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m12">
                <ul class="collapsible" data-collapsible="accordion" ng-show="tasksResult">
                    <li ng-repeat="task in tasksResult| filter:filtro">
                        <div class="collapsible-header">
                            <span class="badge @{{task.color}}-text">@{{task.status_nome}}</span>
                            <i class="material-icons">@{{task.icon}}</i> @{{task.title}}
                        </div>
                        <div class="collapsible-body">
                            <a class='dropdown-button btn right' href='#' ng-click="editar(task)" >
                                <i class="material-icons">mode_edit</i>
                            </a>
                            <a class='dropdown-button btn red right' href='#' ng-click="excluir(task)" >
                                <i class="material-icons">delete</i>
                            </a>
                            <p>
                                @{{task.description}}<br>
                            </p>
                        </div>
                    </li>
                </ul>
                <h5 ng-hide="tasksResult">Nenhuma tarefa registrada...</h5>
            </div>
        </div>
        <br><br>
        <div id="modal1" class="modal">
            <div class="modal-content">
                <h5 ng-show="editando">Editando Registro</h5>
                <h5 ng-show="!editando">Inserindo Registro</h5>

                <div class="row">
                    <div class="col s12 orange" ng-show="mensagem">
                        @{{mensagem.text}}
                    </div>
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="title" placeholder="Titulo" ng-model="corrent.title" type="text" class="validate">
                            </div>
                            <div class="input-field col s6">
                                <input id="description" placeholder="Descrição" ng-model="corrent.description" type="text" class="validate">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6">
                                <select name="status_id" class="browser-default" ng-model="corrent.status_id">
                                    <option ng-repeat="status in statusResult" ng-selected="corrent.status_id == status.id" value="@{{status.id}}">@{{status.nome}}</option>
                                </select>
                            </div>
                            <div class="input-field col m6">
                                <select name="priority" ng-model="corrent.priority">
                                    <option ng-repeat="prioridade in prioridadesResult" ng-selected="corrent.priority == prioridade.id" value="@{{prioridade.id}}">@{{prioridade.nome}}</option>
                                </select>
                                <label>Priridade</label>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <a href="#" class="btn waves-effect waves-green" ng-click="salvar()" ng-show="editando">Confirmar</a>
                <a href="#" class="btn waves-effect waves-green" ng-click="inserir()" ng-show="!editando">Salvar</a>
            </div>
        </div>
    </div>

    @endsection

    @section('scripts')
    <script>

        $(document).ready(function () {
            // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
            $('.modal').modal();
            $('select').material_select();
        });

    </script>
    @endsection