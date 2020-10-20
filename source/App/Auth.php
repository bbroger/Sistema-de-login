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
		$email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
		$passwd = filter_var($data['passwd'], FILTER_SANITIZE_STRIPPED);

		$user = (new User())->find("email = :email", "email={$email}")->fetch();

		if (!$user || !password_verify($passwd, $user->passwd)) {
			echo 'Dados inválidos, tente novamente.';				
			$this->router->redirect("web.login");
			return;
		}

		$_SESSION['user'] = $user->id;
		$this->router->redirect("profile.home");
			
	}

	public function register(?array $data): void
	{
		$data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);		

		$user = new User();
		$user->first_name = $data['first_name'];
		$user->last_name = $data['last_name'];
		$user->email = $data['email'];
		$user->passwd = password_hash($data['passwd'], PASSWORD_DEFAULT);

		if (!$user->save()) {
			echo $user->fail->getMessage();
			return;
		}
 
		$_SESSION['user'] = $user->id;
		$this->router->redirect("profile.home");
	}
}
