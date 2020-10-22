<?php $v->layout("_theme.php"); ?>

<div class="container d-flex justify-content-center">
	<!-- FIRST CONTENT -->
	<div class="first-content">
		<div class="quad-img first-column">
			<div class="create-account">
				<h4>Create Account</h4>
				<a href="<?= $router->route("web.register"); ?>"><button id="register" class="btn btn-outline-primary btn-login">Sign in</button></a>
			</div>
			<div class="form-login second-column">
				<div class="title">
					<img class="user-img" src="<?= ROOT; ?>/themes/login/assets/image/login-icon.png">
					<h4>Login</h4>
				</div>				
				<div class="login-form">
					<form action="<?= $router->route("auth.login"); ?>" class="form-group" method="post" >
						<label for="email-first">Email:
							<input class="form-control" name="email-first" type="email" id="email-first"></input></label>
							<label for="passwd">Password:
								<input class="form-control" type="password" name="passwd"></input></label>
								<button type="submit" class="btn btn-outline-primary btn-login btn-log">LOGIN</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- SECOND CONTENT -->
			<div class="second-content">
				<div class="container d-flex justify-content-center">
					<div class="quad-img first-column">		
						<div class="form-login">			
							<div class="login-form login-register">
								<form action="<?= $router->route("auth.register"); ?>" class="form-group" method="post">
									<label for="first_name">Firstname:<input  class="form-control" type="text" name="first_name" id="first_name"></label>

									<label for="last_name">Lastname:<input  class="form-control" type="text" name="last_name" id="last_name"></label>
									<label for="email-second">Email:
										<input class="form-control" name="email-second" type="email" id="email-second"></input></label>
										<label for="passwd">Password:<input  class="form-control"  type="password" id="passwd" name="passwd"></input></label>

										<button type="submit" class="btn btn-outline-primary btn-login btn-log">REGISTER</button>
									</form>
								</div>
							</div>
							<div class="create-account second-column">
								<h4>Have an Account?</h4>
								<a href="<?= $router->route("web.login"); ?>"><button id="login" class="btn btn-outline-primary btn-login">Login</button></a>
							</div>
						</div>
					</div>
				</div>
			</div> 
			<!-- END FIRST CONTENT -->




			<?php $v->start("scripts"); ?>
			<script type="text/javascript">
				$("#register").on("click", (e) => {
					e.preventDefault();	
					$(".second-content").fadeToggle(400);
					$(".first-content").css("display", "none");
				})

				$("#login").on("click", (e) => {
					e.preventDefault();
					$(".first-content").fadeToggle(400);
					$(".second-content").css("display", "none");
				})

			</script>
			<?php $v->end(); ?>
