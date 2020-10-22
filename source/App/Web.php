<?php 

namespace Source\App;
use Source\Core\Controller;
use laracasts\flash;


class Web extends Controller		
{

    public function __construct($router)
    {
        parent::__construct($router);
    }

    public function login(?array $data): void
    {
        $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    	if (!empty($_SESSION['user']) || isset($_SESSION['user'])) {
            $msg->error("Para acessar a página de login, aperte para sair.");
    		$this->router->redirect("profile.home");
    		return;
    	}
    	echo $this->view->render("login", [
    		"title" => "Página incial", 
            "msg" => $msg->display()]);
        
    }    
}

