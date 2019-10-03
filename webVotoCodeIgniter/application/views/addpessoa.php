<div id="addpessoa" class="card">
	<div class="card-header">
		<h4>Adicionar Membro</h4>
	</div>
	<div class="card-body">
		<?php
		if ($erro) {
			?>
			<div class="alert alert-danger" id = "flash-msg">
				<strong>
					<h4> <i class = "fas fa-exclamation-cirle"></i><?= $erro ?></h4>
				</strong>
			</div>
			<?php
		}
		?>
		<?php
		if ($sucesso) {
			?>
			<div class="alert alert-success" id = "flash-msg">
				<strong>
					<h4> <i class = "fas fa-check-cirle"></i><?= $sucesso ?></h4>
				</strong>
			</div>
			<?php
		}
		?>



		<div>
			<?php echo form_open('comissaopessoa/novo', array('class' => 'form-signin')); ?>
			<div class="form-group">
				<label for="exampleInputNome">Nome</label>
				<input type="text" name="nome" class="form-control" id="exampleInputNome"
					   aria-describedby="emailHelp" placeholder="Enter Nome">
				<small id="emailHelp" class="form-text text-muted">Entre com o nome do membro.</small>
			</div>
			<div class="form-group">
				<label for="exampleInputSiape">Siape</label>
				<input type="text" name="siape" class="form-control" id="exampleInputSiape"
					   placeholder="Siape">
				<small id="emailHelp" class="form-text text-muted">Entre com o siape do membro.</small>
			</div>

			<div class="form-group">
				<label for="exampleInputCurso">Curso/Setor</label>
				<input type="text" name="curso" class="form-control" id="exampleInputCurso"
					   placeholder="Curso ou Setor">
				<small id="emailHelp" class="form-text text-muted">Entre com o curso ou setor do membro.</small>
			</div>

			<div class="form-group">
				<label for="exampleInputCategoria">Categoria</label>
				<input type="text" name="categoria" class="form-control" id="exampleInputCategoria"
					   placeholder="Categoria">
				<small id="emailHelp" class="form-text text-muted">Entre com a categoria do membro.</small>
			</div>
			<br>
			<br>


			
			<button type="submit" class="btn btn-success" ><i class="far fa-user" aria-hidden = "true"></i>  Adicionar</button>
			</form>
		</div>
	</div>
</div>


<script type="text/javascript">
	
	$(document).ready(function () {
    $("#flash-msg").delay(3000).fadeOut("slow"); });

</script>