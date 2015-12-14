
	<form action="<?php echo $this->uri.'/admin/login'; ?>" method="post">
		<p>Login</p>
		<input type="text" name="login" />
		<p>Mot de passe</p>
		<input type="password" name="password" />
		<div class="actions">
			<input type="submit" class="btn primary" value="Se connecter">
		</div>
	</form>
