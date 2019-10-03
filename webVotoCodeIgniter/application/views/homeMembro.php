
<br>

<div id="reuniao" class="card">
	<div class="card-header">
		<h4><?=$reuniao->getNome()?></h4>
		<a class="btn btn-danger navbar-btn" href="<?= base_url('reunioes/sairreuniao/'.$reuniao->getId());?>"><span class="fas fa-sign-out-alt"> Sair da Reunião</span></a>
	</div>
	<br>
	<div class="alert alert-warning" role="alert">
		<h5 class="alert-heading">Esperando Votação</h5>
	</div>
	<a href="#" disabled id="votarBtn" class="btn btn-primary"> Votar </a>
</div>


<script>
	let msg = {};
	if(typeof(EventSource) !== "undefined") {
		var source = new EventSource("<?=base_url('notificacao/sse')?>");
		source.onmessage = function(event) {
			let dataMsg = JSON.parse(event.data);
			if( !msg[dataMsg.id] ){
				console.log(dataMsg);
				msg[dataMsg.id] = dataMsg.mensagem;
				let btn = document.getElementById('votarBtn');
				btn.disabled = false;
				btn.href = '<?=base_url("votacao/index")?>/'+dataMsg.id;
			}
		};
	} else {
		document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
	}

</script>
