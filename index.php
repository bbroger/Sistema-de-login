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
$router->get("/register", "Web:register", "web.register");
$router->get("/forget", "Web:forget", "web.forget");
$router->get("/reset", "Web:reset", "web.reset");


//Rotas principais - Recebimento de dados
$router->group(null);
$router->post("/login", "Auth:login", "auth.login");
$router->post("/register", "Auth:register", "auth.register");
$router->post("/forget", "Auth:forget", "auth.forget");
$router->post("/reset", "Auth:reset", "auth.reset");

//Rota logada
$router->group("/me");
$router->get("/", "Profile:home", "profile.home");
$router->get("/logout", "Profile:logou", "profile.logout");



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