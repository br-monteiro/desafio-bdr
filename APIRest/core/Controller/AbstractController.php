<?php
/**
 * @author Edson B S Monteiro <bruno.monteirodg@gmail.com>
 * 
 * LAUS DEO
 * 
 * Classe Mae dos Controllers
 */
namespace Core\Controller;

use Core\Views\AbstractView;

class AbstractController
{

    private $abstractView;
    protected $parametros = array();
    protected $vw = array();

    public function __construct(array $parametros)
    {
        $this->parametros = $parametros;
        $this->abstractView = new AbstractView();
    }

    /**
     * Retorna os parametros passados na URI
     * @param string $indice Nome do parametro a ser retornado
     * @return mixed
     */
    protected function getParams($indice = null)
    {

        if (array_key_exists($indice, $this->parametros)) {
            return $this->parametros[$indice];
        }

        return null;
    }

    /**
     * Renderiza as views do sistema
     * @param string $view Nome da View a ser renderizada
     */
    protected function render($view)
    {
        $this->abstractView->render($view, $this->vw);
    }
}
