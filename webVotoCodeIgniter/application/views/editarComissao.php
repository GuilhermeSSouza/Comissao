


<div id="addcomissao" class="card">
	<div class="card-header">
		<h4>Editar Comissão</h4>
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
			<?php echo form_open('editar/salvar', array('class' => 'form-signin')); ?>


			<div class="form-group"  style="display: none;">
				<label for="exampleInputNome">Id</label>
				<input type="text" name="id" class="form-control" id="exampleInputNome"
					   aria-describedby="emailHelp" placeholder="id" value="<?= $comissao[0]->getId() ?>">
				
			</div>




			<div class="form-group">
				<label for="exampleInputNome">Nome</label>
				<input type="text" name="nome" class="form-control" id="exampleInputNome"
					   aria-describedby="emailHelp" placeholder="Nome" value="<?= $comissao[0]->getNome() ?>">
				<small id="emailHelp" class="form-text text-muted">Entre com o nome da Comissão.</small>
			</div>
			<div class="form-group">
				<label for="exampleInputSiape">Data de Início</label>
				<input type="text" name="data" class="form-control" id="exampleInputSiape"
					   placeholder="xxxx-xx-xx" value="<?= $comissao[0]->getDate() ?>" >
				<small id="emailHelp" class="form-text text-muted">Entre com  ano - mês - dia.</small>
			</div>

			<div class="form-group">
				<label for="exampleInputCurso">Número de Horas</label>
				<input type="text" name="hora" class="form-control" id="exampleInputCurso"
					   placeholder="Horas" value="<?= $comissao[0]->getHoras() ?>">
				<small id="emailHelp" class="form-text text-muted">Entre com número de horas.</small>
			</div>

			<div class="form-group">
				<label for="exampleInputCurso"> Descrição</label>
				<textarea name="descricao" rows="5"  class="form-control" id="exampleInputCurso"
					   placeholder="Descrição"><?= $comissao[0]->getDescricao() ?></textarea>
				<small id="emailHelp" class="form-text text-muted">Entre com a descrição da comissão.</small>
			</div>
			<div class="form-group">
				<label for="exampleInputSiape">Data de Fim</label>
				<input type="text" name="datafim" class="form-control" id="exampleInputSiape"
					   placeholder="xxxx-xx-xx" value="<?= $comissao[0]->getDatefim() ?>" >
				<small id="emailHelp" class="form-text text-muted">Entre com  ano - mês - dia.</small>
			</div>

			
			<br>
			<br>


			
			<button type="submit" class="btn btn-success" ><i class="far fa-list-alt" aria-hidden = "true"></i> Salvar</button>
			<a class="btn btn-warning" href="<?= base_url('login/home/'); ?>">
            <i class="fas fa-undo"></i> Voltar </a>
			</form>
		</div>
	</div>
</div>


<script type="text/javascript">
	
	$(document).ready(function () {
    $("#flash-msg").delay(3000).fadeOut("slow"); });

</script>