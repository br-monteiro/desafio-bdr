var app = angular.module("checkIt");

// dados dos clientes
app.controller("taskController", function ($scope, $http) {
    $scope.formTitle = 'Nova Tarefa';
    $scope.filtro = '';
    $scope.editando = false;
    $scope.corrent = {};
    $scope.mensagem = {};

    $scope.tasksResult = [];
    $scope.statusResult = [];
    $scope.prioridadesResult = [{id: 1, nome: 'Normal'}, {id: 2, nome: 'Rapida'}, {id: 3, nome: 'Urgente'}];

    var listAllTasks = function () {
        $http.get('/tasks/user/1').success(function (data, status) {
            //console.log(data);
            //console.log(status);
            $scope.tasksResult = data;
        });
    };

    var listAllStatus = function () {
        $http.get('/status/all').success(function (data, status) {
            //console.log(data);
            //console.log(status);
            $scope.statusResult = data;
        });

    };

    listAllStatus();
    listAllTasks();

    $scope.openForm = function () {
        $('#modal1').modal('open');
    };

    $scope.closeForm = function () {
        $('#modal1').modal('close');
    };

    // adiciona
    $scope.add = function () {
        $scope.editando = false;
        $scope.setCorrent({});
        $scope.openForm();
    };

    // editando um elemento
    $scope.editar = function (dado) {
        $scope.setCorrent(dado);
        $scope.editando = true;
        $scope.openForm();
    };


    // salva a edição de clientes
    $scope.salvar = function () {
        var dado = $scope.corrent;
        dado.users_id = 1;

        $http.put('/task/' + dado.id, dado)
                .success(function (data, status) {

                    if (status == 203) {
                        $scope.mensagem = data;
                        return true;
                    }
                    
                    listAllTasks();
                    $scope.closeForm();
                    $scope.mensagem = {};
                    console.log(data);
                    
                })
                .error(function (error) {
                    console.log(error);
                });
    };

    $scope.inserir = function () {

        var dado = $scope.corrent;
        dado.users_id = 1;

        $http.post('/tasks', dado)
                .success(function (data, status) {

                    if (status == 203) {
                        $scope.mensagem = data;
                        return true;
                    }
                    
                    listAllTasks();
                    $scope.closeForm();
                    $scope.mensagem = {};
                    
                })
                .error(function (error) {
                    console.log(error);
                });
    };

    // exclui registros
    $scope.excluir = function (task) {
        $http.delete('/task/' + task.id)
                .success(function (data, status) {
                    $scope.tasksResult.splice(task, 1);
                })
                .error(function (error) {
                    console.log(error);
                });
    };

    $scope.setCorrent = function (dado) {
        $scope.corrent = dado;
        $scope.openForm();
    };

    // limpa o formulário
    $scope.clearForm = function () {
        $scope.registro = [];
    };
});