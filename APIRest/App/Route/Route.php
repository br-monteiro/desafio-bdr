<?php
/**
 * @author Edson B S Monteiro <bruno.monteirodg@gmail.com>
 * 
 * LAUS DEO
 * 
 * Class onde sao definidas as rotas do sistema
 */
namespace App\Route;

use App\Config\ConfigApp as cfg;
use Core\RouterSystem\RouteMap;

class Route
{

    /**
     * @var RouteMap
     */
    private $routeMap;

    public function __construct(RouteMap $routeMap)
    {
        $this->routeMap = $routeMap;
    }

    /**
     * Registra as rotas no sistma
     */
    public function registra()
    {
        $this->routeMap->rotaGet(array(cfg::PREFIX_ROUTE . '/', 'HomeController@index', array()));
        $this->routeMap->rotaGet(array(cfg::PREFIX_ROUTE . '/home', 'HomeController@index', array()));

        $this->routeMap->rotaGet(array(cfg::PREFIX_ROUTE . '/login', 'UsuariosController@login', array()));
        $this->routeMap->rotaGet(array(cfg::PREFIX_ROUTE . '/user/novo', 'UsuariosController@novo', array()));
        $this->routeMap->rotaPost(array(cfg::PREFIX_ROUTE . '/auth', 'AuthController@login', array()));

        $this->routeMap->rotaGet(array(cfg::PREFIX_ROUTE . '/tasks', 'TasksController@index', array()));
        $this->routeMap->rotaGet(array(cfg::PREFIX_ROUTE . '/tasks/all', 'TasksController@listAll', array()));
        $this->routeMap->rotaGet(array(cfg::PREFIX_ROUTE . '/tasks/user/{id}', 'TasksController@tasksByUser', array(
                'id' => '/\d+/'
        )));
        
        $this->routeMap->rotaPost(array(cfg::PREFIX_ROUTE . '/tasks', 'TasksController@novo', array()));
        
        $this->routeMap->rotaPut(array(cfg::PREFIX_ROUTE . '/task/{id}', 'TasksController@edit', array(
                'id' => '/\d+/'
        )));
        
        $this->routeMap->rotaDelete(array(cfg::PREFIX_ROUTE . '/task/{id}', 'TasksController@remove', array(
                'id' => '/\d+/'
        )));
        
        $this->routeMap->rotaGet(array(cfg::PREFIX_ROUTE . '/status/all', 'StatusController@listAll', array()));
        
        $this->routeMap->rotaGet(array(cfg::PREFIX_ROUTE . '/stats/{id}', 'EnderecosController@statsPorId', array(
                'id' => '/\d+/'
        )));
    }

    /**
     * Retorna a referencia para o objeto RouteMap
     * @return RouteMap
     */
    public function getRouteMap()
    {
        return $this->routeMap;
    }
}
