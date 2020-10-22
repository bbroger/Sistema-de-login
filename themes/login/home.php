<?php $v->layout("_theme.php"); ?>


<div class="container justify-content-center home-page">	
	<div class="title">
		<h3>Página do usuário.</h3>
		<p>Seja bem-vindo(a), <?= $user->first_name; ?>.</p>
		<p>Por enquanto a única coisa que você pode fazer é deslogar, rs. ;)</p>			
		<a href="<?= $router->route("profile.logout"); ?>"><button id="btn-logout" class="btn btn-outline-primary btn-login btn-log">Logout</button></a>
	</div>

</div>


