<?php $v->layout("_theme.php"); ?>



<h1>Página de login.</h1>



<form action="<?= $router->route("auth.login"); ?>" method="post">
	<input type="text" name="email" required="">
	<input type="password" name="passwd" required="">
	<button type="submmit" class="btn btn-primary">Login</button>
</form>