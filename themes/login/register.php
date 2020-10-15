<?php $v->layout("_theme.php"); ?>



<div class="container">
	<div class="form">
		<form action="<?= $router->route("auth.register"); ?>" method="post">
			<label for="name">Name:</label>
			<input type="text" id="name" name="first_name">
			<label for="last_name">Lastname:</label>
			<input id="last_name" type="text" name="last_name">
			<label for="email">Email:</label>
			<input id="email" type="email" name="email">
			<label for="passwd">Password:</label>
			<input id="passwd" type="password" name="passwd">
			<button type="submit">Register</button>
		</form>
	</div>
</div>