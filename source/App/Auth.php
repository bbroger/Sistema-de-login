<?php 

namespace Source\App;
use Source\Core\Controller;
use Source\Models\User;


class Auth extends Controller
{

	public function __construct($router)
	{
		parent::__construct($router);
	}

	public function login(?array $data)
	{	
		$msg = new \Plasticbrain\FlashMessages\FlashMessages();

		$email = filter_var($data['email-first'], FILTER_VALIDATE_EMAIL);
		$passwd = filter_var($data['passwd'], FILTER_SANITIZE_STRIPPED);

		$user = (new User())->find("email = :email", "email={$email}")->fetch();

		
		if (!$user || !password_verify($passwd, $user->passwd)) {
			$msg->error("Dados inválidos. Tente novamente.");				
			$this->router->redirect("web.login");
			return;
		}
		
		$_SESSION['user'] = $user->id;
		$msg->success("Parabéns, você foi logado com sucesso.");
		$this->router->redirect("profile.home");

	}

	public function register(?array $data): void
	{
		$data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);	

		$msg = new \Plasticbrain\FlashMessages\FlashMessages();

		$user = new User();
		$user->first_name = $data['first_name'];
		$user->last_name = $data['last_name'];
		$user->email = $data['email-second'];
		$user->passwd = password_hash($data['passwd'], PASSWORD_DEFAULT);

		if (!$user->save()) {
			$msg->error("Não foi possível registrar novo usuário.");
			$this->router->redirect("web.login");
			return;
		}

		$_SESSION['user'] = $user->id;
		$msg->success("Usuário registrado com sucesso.");
		$this->router->redirect("profile.home");
	}
}
