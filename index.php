<?php 
ob_start();
session_start();

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(ROOT);
$router->namespace("source\App");

//Rotas principais - Deslogadas
$router->group(null);
$router->get("/", "Web:login", "web.login");

//Rotas principais - Recebimento de dados
$router->group(null);
$router->post("/login", "Auth:login", "auth.login");
$router->post("/register", "Auth:register", "auth.register");

//Rota logada
$router->group("/me");
$router->get("/", "Profile:home", "profile.home");
$router->get("/logout", "Profile:logout", "profile.logout");

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