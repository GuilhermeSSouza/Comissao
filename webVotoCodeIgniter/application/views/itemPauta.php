<br>

<h1> Moderador - Item de Pauta </h1>

<div>
	<h3> Item de Pauta selecionado: </h3>
	<input type="hidden" value="<?= $idItemPauta ;?>" id="idItemPauta">
	<div id="itensPauta" class="card">
		<div class="card-header">
			<h4>Item de Pauta</h4>
			<p>Adicionar Opções de Voto e encaminar para votação</p>
			<select id="tipoItemPauta" class="form-control col-sm-12 col-md-2" onChange="toggleTipoVoto(this);">
				<option value="1"> Normal</option>
				<option value="2"> Customizada</option>
			</select>
		</div>
		<br>

		<div id="votoNormal">
			<table class="table">
				<thead>
				<tr>
					<th scope="col">Descrição</th>

				</tr>
				</thead>
				<tbody>
				<tr>
					<td> Favoravel</td>
				</tr>
				<tr>
					<td> Contrário</td>
				</tr>
				<tr>
					<td> Abster</td>
				</tr>
				</tbody>
			</table>
		</div>

		<div id="votoCustom">

			<div class="form-group row">
				<label for="fefefe" class="col-sm-4"> Nova opção de voto</label>
				<div class="col-sm-4">
					<input type="text" id="fefefe" class="form-control">
				</div>
				<div class="col-sm-2">
					<button class="btn btn-success" onclick="adicionaOpcaoVoto();"> Incluir</button>
				</div>
				<div class="col-sm-2">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="segundoTurno">
						<label class="form-check-label" for="defaultCheck1"> 2º Turno </label>
					</div>
				</div>
			</div>

			<table class="table" id="votosTabela">
				<thead>
				<tr>
					<th scope="col"> id </th>
					<th scope="col">Descrição</th>
					<th scope="col"> Ação</th>
				</tr>
				</thead>
				<tbody id="tbodyOpcaoVoto">
				<tr>
					<td> 1 </td>
					<td class="opcaoVoto"> Abster</td>
					<td><button disabled class="btn btn-danger">Excluir</button></td>
				</tr>
				</tbody>
			</table>
			
		</div>

		<div> <a href="#" class="btn btn-primary" onclick="encaminhar();"> Encaminhar </a> </div>

	</div>

	<br>

</div>

<div class="modal fade" id="myAlert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Alerta</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Ok!</button>
			</div>
		</div>
	</div>
</div>

<script>

	let table = $('#votosTabela').DataTable({ rowReorder: true });

	function toggleTipoVoto(n) {
		switch (n.value) {
			case '1' :
				$('#votoNormal').show();
				$('#votoCustom').hide();
				break;
			case '2' :
				$('#votoNormal').hide();
				$('#votoCustom').show();
				break;
		}
	}

	function adicionaOpcaoVoto() {
		let op = $('#fefefe');
		if (!op[0].value) {
			alertify.error('This');
			return;
		}
		let votos = $('.opcaoVoto');
		for (let i = 0; i < votos.length; i++) {
			if (op[0].value.toLowerCase().trim() == votos[i].innerText.toLowerCase().trim()) {
				$('#myAlert .modal-body').text("Opção " + op[0].value + " já existe!");
				$('#myAlert').modal('show');
				op[0].value = "";
				return;
			}
		}

		let tr = document.createElement('tr');
		let td = document.createElement('td');
		td.classList.add('opcaoVoto');
		let tdExcluir = document.createElement('td');
		let exBtn = document.createElement('button');
		exBtn.innerText = "Excluir";
		exBtn.classList.add('btn');
		exBtn.classList.add('btn-danger');
		exBtn.onclick = function () {
			this.parentNode.parentNode.remove();
		}
		let rowNode = table.row.add([votos.length+1,
									 op[0].value,
									 '<button class="btn btn-danger" onClick="deleteRow($(this).parents(\'tr\'));"> Excluir </button>'
									 ]).draw().node();
		$( rowNode ).find('td').eq(1).addClass('opcaoVoto');
		op[0].value = "";
	}
	
	function deleteRow(value){
		let row = table.row( value );
		row.remove();
		table.draw();
	}
	
	function encaminhar(){
		let tipoVotacao = $('#tipoItemPauta');
		let id = $('#idItemPauta');
		let segundoTurno = $('#segundoTurno');
		let votos = table.rows().data();
		let data = new FormData();
		data.append('idItemPauta', id[0].value);
		data.append('tipoVotacao', tipoVotacao[0].value);
		data.append('segundoTurno', segundoTurno[0].checked);
		let arr = ['Favoravel','Contrário','Abster'];
		if( tipoVotacao[0].value == 2 ){
			arr = [];
			for(let i = 0; i < votos.length; i++){
				arr.push( votos[i][1] );
			}
		}
		data.append('opcoes', arr);
		let x = new XMLHttpRequest();
		x.open('POST', '<?=base_url('itensPauta/encaminhar');?>', true);
		x.onreadystatechange = function(){
			if(this.readyState === 4 && this.status === 200){
				if( this.responseText.match(/ok/)){
					window.location.href = '<?=base_url('itensPauta/emvotacao/')?><?=$idItemPauta?>';
				}
			}
		};
		x.send(data);
	}
</script>
