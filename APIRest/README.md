#### Uma simples API de gerenciamento de tarefas!

### Dependências
* PHP5 5.3+
* Apache Server 2.4 +
* MySQL 5.5 +
* philo/laravel-blade +3
* symfony/var-dumper +3.1 – usado no desenvolvimento
* jQuery
* Materialize
* AngularJS

### Instalação
### As explicações a seguir são baseadas em Linux (Ubuntu Like)!

Para facilitar a instalação das dependências, execute o script __instal.sh__ da raiz do projeto como usuário root. Neste arquivo, encontram-se os comandos necessários para instalação dos programas e suas dependências. É importante lembrar que quando o SGBD MySQL estiver sendo instalado, será necessário fornecer uma senha para o usuário root do MySQL.
__Guarde esta senha__ em um local seguro, pois precisaremos dela posteriormente.

### Configurações
__Servidor HTTP__: Após a instalação do servidor, é preciso apontar o *DocumentRoot* do Apache para a pasta __public__ dentro do projeto.
Para realizar esta alteração, é preciso editar os seguintes arquivos:
```
# nano /etc/apache2/apache2.conf
```
Alterar a linha:
```
   <Directory /var/www/>
```
Para fica assim:
```
   <Directory /diretorio/da/aplicacao/public/>
         Options Indexes FollowSymLinks
         AllowOverride All
         Require all granted
   </Directory>
```
Arquivo 2:
```
# nano /etc/apache2/sites-available/000-default.conf
```
ou
```
# nano /etc/apache2/sites-available/default.conf
```
Alterar a linha:
```
    DocumentRoot /var/www
```
para
```
    DocumentRoot /diretorio/da/aplicacao/public/
```

__Habilitando Modo rewrite__: Esta configuração é necessária para o correto funcionamento das rotas
```
# a2enmod rewrite
```
Após as alterações, reinicie o Apache Server:
```
# service apache2 restart
```

__Criação do Banco de Dados__: Para que a aplicação seja usada, é necessário importar o Banco de Dados; isso pode ser feito importando arquivo SQL (*gerenciador_tarefa.sql*) encontrado no diretório *Projeto/Dump SQL/* da aplicação. Executando a importação:
1. Navegue até a raiz da aplicação
2. Execute o comando (Será necessário fornecer a senha do usuário root do MySQL):
```
$ mysql -uroot -p < gerenciador_tarefa.sql 
```

__Informando usuário e senha do SGBD__: Agora, para que o sistema reconheça o SGBD e consiga se conectar ao mesmo é necessário fornecer as credenciais de acesso. Edite o arquivo *App/Config/ConfigDatabase.php* e altere conforme abaixo:
```php
    public $db = [
        'sgbd' => 'mysql',
        'server' => 'localhost', // <- informe o servidor de Banco de Dados
        'dbname' => 'gerenciador_tarefa',
        'username' => 'root',
        'password' => 'SENHA_DEFINIDA_NA_ISTALAÇÃO_DO_MYSQL', // <- Altere aqui!
        'options' => [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"],
    ];
```

### Funcionamento
Basicamente, os acessos são recebidos pelo arquivo *public/index.php* que por sua vez inicia a aplicação. Ao instanciar a Classe *\Core\Bootstrap\InitApp()* o Roteador do sistema entra em ação para validar a requisição e rota acessada, caso tudo ocorra como o esperado, são guardados os parâmetros enviados na URI; contudo, se a Rota requisitada não estiver registrada na Classe */App/Route/Route.php*, o roteador muda o Status da requisição para __404 Not Found__ e aborta a execução do script.

Após a confirmação da rota, o Controller e a Action definidas para a mesma são validados, caso um deles não esteja em conformidade uma __\Exception(...)__ é lançada e o script abortado. Se nenhuma exceção foi lançada o método __run()__ será executado, o que instanciará o Controller da rota e a execução da action;

__Rotas__: As rotas são registradas na Classe */App/Route/Route.php* dentro dométodo _registra()_  com o seguinte padrão:
```php
    $this->routeMap->rotaGet(
        array(cfg::PREFIX_ROUTE . '/tasks/user/{id}', 'TasksController@tasksByUser', array(
                'id' => '/\d+/' // validação do parâmetro
        )));
```

__Controllers__: Os Controllers têm a simples função de chamar os métodos responsáveis por determinada ação no sistema. Para a criação de um novo Controller, são necessárias as seguintes observações:
1. Estar definido dentro do *namespace App\Controollers;*
2. Estender a Classe *\Core\Controller\AbstractController;*
3. Implementar a Interface *\Core\Interfaces\ControllerInterface*;

__Models__: Neste sistema, os Models são Classes que manipulam o CRUD e validam os dados enviados. Para criar uma Classe do tipo Model, são necessárias as seguintes observações:
1. Estar definido detro do *namespace App\Models;*
2. Extender a Classe *\Core\Database\ModelAbstract;*

### Endpoints
1. [GET] / -> Retorna 200 Ok (Página inicial)
2. [GET] /home -> Retorna 200 Ok (Página inicial)
3. [GET] /login -> Retorna 200 Ok (Formulário de login)
4. [GET] /user/novo -> Retorna 200 Ok (Formulário de login)
5. [POST] /auth -> Retorna 200 Ok.
6. [GET] /tasks -> Retorna 200 Ok (Página de listagem das tarefas)
7. [GET] /tasks/all -> Retorna objeto JSON e código 200 Ok (Lista de todas as tarefas)
8. [GET] /tasks/user/:id -> Retorna objeto JSON e código 200 Ok (Lista de todas as tarefas de um usuário específico)
9. [POST] /tasks -> Retorna 201 Created em caso de Sucesso ou 203 em caso de erro (Adiciona uma nova tarefa)
10. [PUT] /task/:id -> Retorna 200 Ok em caso de Sucesso ou 203 em caso de erro (Altera um registro de tarefa)
11. [DELETE] /task/:id -> Retorna 200 Ok em caso de Sucesso ou 500 em caso de erro (Exclui um registro de tarefa)
12. [GET] /status/all -> Retorna objeto JSON e código 200 Ok (Lista de todos os Status)

### Créditos
Esta aplicação foi orgulhosamente desenvolvida no Elementary OS por Edson B S Monteiro | <bruno.monteirodg@gmail.com>

### Laus Deo!