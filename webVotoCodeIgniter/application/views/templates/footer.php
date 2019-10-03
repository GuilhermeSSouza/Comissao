</div>
<footer class="footer">
    <div class="container">
        <span class="text-muted">WebComissao - Desenvolvido por Guilherme Santos - Software Engineer </span>
    </div>
</footer>

<div class="modal fade" id="modal-confirmacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
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
                <button id="modal-confirmacao-submeter" type="button" class="btn btn-success">Confirmar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-mensagem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Aviso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#modal-confirmacao-submeter').click(function () {
        console.log(formId);
        var form = 'form#'+formId;

        $(form).submit();
    });

    function exibirMensagem(titulo,mensagem){
        $('#modal-mensagem.modal-header').text(titulo);
        $('#modal-mensagem .modal-body').text(mensagem);
        $('#modal-mensagem').modal('show');
    }

</script>

</body>
</html>
