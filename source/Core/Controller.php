<?php 

namespace Source\Core;

use League\Plates\Engine;

class Controller
{
	private $router;
	private $view;

    public function __construct($router)
    {
        $this->router = $router;
        $this->view = Engine::create(CONF_PATH_VIEW . CONF_VIEW_THEME, CONF_VIEW_EXT);
        $this->view->addData(["router" => $this->router]);
    }
}
