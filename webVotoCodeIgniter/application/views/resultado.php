<br>
<h1> Resultado Votação</h1>
<h2> Opção Vencedora: <?=$vencedora?></h2>
<div id="resultado_opção" class="card">
	<div class="card-header">
		<h4>Votos por Opção</h4>
	</div>
	<br>
	<div class="table-responsive">
		<table id="tabelavotosop" class="table">
			<thead>
			<tr>
				<th scope="col">Voto</th>
				<th scope="col">Quantidade</th>
			</tr>
			</thead>
			<tbody>
			<?php
			foreach ($countVotos as $voto) {
				?>
				<tr>
					<td><?= $voto[0] ?></td>
					<td><?= $voto[1] ?></td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
	</div>
</div>
<br>
<div id="resultado_membro" class="card">
	<div class="card-header">
		<h4>Votos por Membro</h4>
	</div>
	<br>
	<div class="table-responsive">
		<table id="tabelavotomembro" class="table">
			<thead>
			<tr>
				<th scope="col">Membro</th>
				<th scope="col">Voto</th>
			</tr>
			</thead>
			<tbody>
			<?php
			foreach ($votosMembros as $voto) {
				?>
				<td><?= $voto[0] ?></td>
				<td><?= $voto[1] ?></td>
				<?php
			}
			?>
			</tbody>
		</table>
	</div>
</div>
