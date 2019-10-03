<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<img id="logo" src="<?= base_url('assets/img/icone.png'); ?>" width="30" height="30"
		 class="d-inline-block align-top" alt="">
	<span class="navbar-brand"> WebComissao</span>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu"
			aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="menu">
	</div>
</nav>
<div id="areaLogin" class="card">
	<div class="card-header">
		<h4>Login</h4>
	</div>
	<div class="card-body">
		<?php
		if ($erro) {
			?>
			<div class="alert alert-danger" role="alert">
				<strong>
					<?= $erro ?>
				</strong>
			</div>
			<?php
		}
		?>
		<div>
			<?php echo form_open('login/logar', array('class' => 'form-signin')); ?>
			<div class="form-group">
				<label for="exampleInputEmail1">E-mail</label>
				<input type="email" name="usuario" class="form-control" id="exampleInputEmail1"
					   aria-describedby="emailHelp" placeholder="Enter email">
				<small id="emailHelp" class="form-text text-muted">Entre seus dados de login.</small>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Senha</label>
				<input type="password" name="senha" class="form-control" id="exampleInputPassword1"
					   placeholder="Password">
			</div>
			<div class="form-group form-check">
				<input type="checkbox" class="form-check-input" id="exampleCheck1">
				<label class="form-check-label" for="exampleCheck1">Lembrar?</label>
			</div>
			<button type="submit" class="btn btn-success">Enviar</button>
			</form>
		</div>
	</div>
</div>
