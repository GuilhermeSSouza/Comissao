<div id="addcomissao" class="card">
	<div class="card-header">
		<h4>Pesqusiar Membro em Comissão: </h4>
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
			<?php echo form_open('busca/pesquisaMembro', array('class' => 'form-signin')); ?>
			<div class="form-group-control" >
				<label for="exampleInputNome">Nome </label>
				<input type="text" name="nome" class="form-control" id="exampleInputNome"
					   aria-describedby="emailHelp" placeholder="Nome">
				<small id="emailHelp" class="form-text text-muted">Entre com o nome para pesquisar Comissões.</small>

				
			</div>

			<br>
			<button type="submit" class="btn btn-success" ><i class="fas fa-search"></i> Pesqusiar </button>

			
			
			</form>
		</div>
	</div>
</div>

<div>
<br>
<br>
<br>
<br>

</div>




<div id="painelBusca">

    <?php
    if ($result !== null) {
        ?>
        <div id="comissaoTable" class="card">
            <div class="card-header">
                <h4> Resultado da busca pelo nome: <?= $result[0]->getNome() ?> </h4>
            </div>
            <br>
            <div class="table-responsive">
                <table id="tabelaComissao" class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Siape</th>
                        <th scope="col">Comissão</th>
                        <th scope="col">Horas</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($result as $r) { ?>
                        <tr>
                            <td><?= $r->getNome(); ?></td>
                            <td><?= $r->getSiape(); ?></td>
                            <td><?= $r->getNomecomissao()?></td>
                            <td><?= $r->getHorascomissao(); ?></td>
                            <td>
                                <a class="btn btn-success" href="<?= base_url('comissaopessoa/vizualizar/' . $r->getId()); ?>">
                                    <i class="fas fa-eye"></i> Membros
                                </a>
                                <a class="btn btn-warning" href="<?= base_url('comissaopessoa/vizualizar/' . $r->getId()); ?>">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <a class="btn btn-danger" href="<?= base_url('comissaopessoa/vizualizar/' . $r->getId()); ?>">
                                    <i class="fas fa-trash"></i> Deletar
                                </a>


                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <?php
     } ?>
    <br>
</div>


<script type="text/javascript">
     let table = $('#tabelaComissao').DataTable();
</script>


<script type="text/javascript">
	
	$(document).ready(function () {
    $("#flash-msg").delay(3000).fadeOut("slow"); });

</script>