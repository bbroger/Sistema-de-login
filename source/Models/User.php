<?php 
namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Exception;



class User extends DataLayer
{
    public function __construct()
    {
        parent::__construct("users", ["first_name", "last_name", "email", "passwd"]); 
    }

    public function save(): bool
    {
    	if (!parent::save() || !$this->validateEmail() || !$this->validatePasswd()) {
    			return false;
    		}	

    	return true;
    }


    public function validateEmail(): bool
    {
    	if (empty($this->email || filter_var($this->email, FILTER_VALIDATE_EMAIL))) {
    		$this->fail = new Exeception("Informe um email válido");
    		return false;
    	}

    	$userByEmail = null;
    	if (!$this->id) {
    		$userByEmail = $this->find("email = :email", "email={$this->email}")->count();
    	}else {
    		$userByEmail = $this->find("email = :email AND id != :id", "email={$this->email}&id={$this->id}")->count();
    	}

    	if ($userByEmail) {
    		$this->fail = new Exception("Email informado já existe");
    		return false;
    	}

    	return true;
    }

    public function validatePasswd()
    {
    	if (password_get_info($this->passwd)['algo']) {
    		return true;
    	}

    	$this->passwd = password_hash($this->passwd, PASSWORD_DEFAULT);
    	return true;
    }
}
