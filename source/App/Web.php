<?php 

namespace Source\App;
use Source\Core\Controller;


class Web extends Controller		
{
    
    public function __construct($router)
    {
        parent::__construct($router);
    }

    public function login(?array $data)
    {
    	echo "<h1>Olá, mundo.</h1>";
    }
}

