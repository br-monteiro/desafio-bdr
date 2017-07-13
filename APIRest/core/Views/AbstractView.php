<?php
/**
 * @author Edson B S Monteiro <bruno.monteirodg@gmail.com>
 * 
 * LAUS DEO
 * 
 * Classe Mae das Views
 */
namespace Core\Views;

use Philo\Blade\Blade;
use App\Config\ConfigApp as cfg;

class AbstractView extends Blade
{

    public function __construct()
    {
        parent::__construct(cfg::VIEWS_DIR, cfg::CACHE_DIR);
    }

    final public function render($view, array $value = array())
    {
        echo $this->view()->make($view, $value)->render();
    }
}
