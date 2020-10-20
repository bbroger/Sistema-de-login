<?php 

namespace Source\App;
use Source\Core\Controller;


class Web extends Controller		
{
    
    public function __construct($router)
    {
        parent::__construct($router);
    }

    public function login(?array $data): void
    {
    	if (!empty($_SESSION['user']) || isset($_SESSION['user'])) {
    		$this->router->redirect("profile.home");
    		return;
    	}
    	echo $this->view->render("login", [
    		"title" => "Página incial"]);

    }

    public function register(?array $data): void
    {
    	echo $this->view->render("register", [
    		"title" => "Register"]);
    }

    public function forget(?array $data)
    {
    	echo $this->view->render("forget", [
    		"title" => "Forget"]);
    }

    public function reset(?array $data)
    {
    	echo $this->view->render("reset", [
    		"title" => "Reset"]);
    }
    
}

