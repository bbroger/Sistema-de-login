<?php $v->layout("_theme.php"); ?>



<div class="container">
	<div class="title">
		<h1>Página logada</h1>
	</div>
	<div class="content">
		<p>Seja bem-vindo(a) <?= $user->first_name; ?></p>
	</div>
	<a href="<?= $router->route("profile.logout"); ?>">Sair</a>
</div>