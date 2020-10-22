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
        $msg = new \Plasticbrain\FlashMessages\FlashMessages();

        if (empty(($_SESSION['user'])) || !$user = (new User())->find("id = :id", "id={$_SESSION['user']}")) {
            unset($_SESSION['user']);
            $msg->error("Por favor, faça o login para acessar essa página.");
            $this->router->redirect("web.login");
            return;
        }

        $user = (new User())->find("id = :id", "id={$_SESSION['user']}")->fetch();
        echo $this->view->render("home", [
            "title" => "Seja bem-vindo(a) " . $user->first_name, 
            "user" => $user, 
            "msg" => $msg->display()]);   

    }

    public function logout(): void  
    {
        $msg = new \Plasticbrain\FlashMessages\FlashMessages();
        unset($_SESSION['user']);
        $msg->success("Você foi deslogado com sucesso.");
        $this->router->redirect("web.login");
    }
}
