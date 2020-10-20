<?php 

namespace Source\App;

use Source\Core\Controller;
use Source\Models\User;


class Profile extends Controller
{
    public function __construct($router)
    {
        parent::__construct($router);
    }

    public function home(): void
    {
    	if (empty(($_SESSION['user'])) || !$user = (new User())->find("id = :id", "id={$_SESSION['user']}")) {
            unset($_SESSION['user']);
            $this->router->redirect("web.login");
            return;
        }

        $user = (new User())->find("id = :id", "id={$_SESSION['user']}")->fetch();
        echo $this->view->render("home", [
            "title" => "Seja bem-vindo(a) " . $user->first_name, 
            "user" => $user]);        
    }

    public function logout(): void  
    {
        unset($_SESSION['user']);
        $this->router->redirect("web.login");
    }
}
