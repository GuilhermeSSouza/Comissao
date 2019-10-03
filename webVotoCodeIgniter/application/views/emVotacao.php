<h5>Em Votação</h5>

<script>

const minhaVotacao = '<?=$idItemPauta?>';

	if(typeof(EventSource) !== "undefined") {
		var source = new EventSource("<?=base_url('notificacao/sse')?>");
		source.onmessage = function(event) {
			let dataMsg = JSON.parse(event.data);

				dataMsg.mensagem;
				if( dataMsg.id == minhaVotacao && dataMsg.mensagem == "votacao_encerrada" )
					window.location.href = '<?=base_url('votacao/resultado/')?><?=$idItemPauta?>';
				}
			
	} else {
		document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
	}

</script>
