<?php 
ob_start();

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(ROOT);
$router->namespace("source\App");


//Rotas principais - Deslogadas
$router->group(null);
$router->get("/", "Web:login", "web.login");


//Rota de erro 
$router->group("/ops");
$router->get("/{errcode}", "Web:erro", "web.erro");


//Despache das rotas
$router->dispatch();


//Verificação de erro e redirecionamento
if ($router->error()) {
	$router->redirect("/ops/{$router->error()}");
}

ob_end_flush();