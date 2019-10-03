<br>
<div id="reuniao" class="card">
    <div class="card-header">
        <h4>Votando teste</h4>
        <p>Relator: teste</p>
    </div>
    <div class="card-body">
        <p>Selecione uma Opção de Voto:</p>

        <form id="formVotar" action="<?= base_url('votacao/votar') ?>" method="post">
            <input type="hidden" name="idItemPauta" value="<?= $itemPauta->getId() ?>">
            <?php foreach ($itemPauta->getOpcoesVoto() as $i) { ?>
                <div class="form-check" id="opcoes">
                    <label><input class="option" type="radio" name="opcao" required
                                  value="<?= $i->getId() ?>"/>
                        <?= $i->getDescricao() ?>
                    </label>
                </div>
            <?php } ?>
            <br>
            <div class="text-center">
                <button type="button" class="btn btn-lg btn-success " onclick="exibirConfirmacaoVoto('formVotar');">Votar</button>
            </div>
        </form>
    </div>

</div>

<script>
    function exibirConfirmacaoVoto(form) {
        var selecionado = $('.option:checked').parent().text();
        formId = form;

        if(!selecionado){
            exibirMensagem("Erro", "Você deve selecionar uma opção de voto!");
            return;
        }

        $('#modal-confirmacao .modal-header').text("Confirme sua opção de voto");
        $('#modal-confirmacao .modal-body').text(selecionado);
        $('#modal-confirmacao').modal('show');

    }

</script>