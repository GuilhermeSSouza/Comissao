
<br>

<div id="painelReunioes">
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







    <?php
    if ($comissao !== null) {
        ?>
        <div id="comissaoTable" class="card">
            <div class="card-header">
                <h4>Comissões do Campus ITAQUI</h4>
            </div>
            <br>
            <div class="table-responsive">
                <table id="tabelaComissao" class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">DataInicio</th>
                        <th scope="col">DataFim</th>                        
                        <th scope="col">Horas</th>
                        <th scope="col">Descricao</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($comissao as $r) { ?>
                        <tr>
                            <td><?= $r->getNome(); ?></td>
                            <td><?= $r->getDate(); ?></td>
                            <td><?= $r->getDatefim(); ?></td>
                            <td><?= $r->getHoras()?></td>
                            <td><?= $r->getDescricao(); ?></td>
                            <td>
                                <a class="btn btn-success" href="<?= base_url('comissaopessoa/vizualizar/' . $r->getId()); ?>">
                                    <i class="fas fa-eye"></i> Membros
                                </a>
                                <a class="btn btn-warning" href="<?= base_url('editar/editarComissao/' . $r->getId()); ?>">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <a class="btn btn-danger" href="<?= base_url('deletecomissao/delete/'. $r->getId()); ?>">
                                    <i class="fas fa-trash"></i> Desativar
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

<div>
    <br>
    <br>
</div>



    <?php
    if ($inativa !== null) {
        ?>
    <div id="painelReunioesinativas">
        <div id="comissaoTable" class="card">
            <div class="card-header">
                <h4>Comissões INATIVAS</h4>
            </div>
            <br>
            <div class="table-responsive">
                <table id="tabelaComissaoinativa" class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">DataInicio</th>
                        <th scope="col">DataFim</th>
                        <th scope="col">Horas</th>
                        <th scope="col">Descricao</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($inativa as $r) { ?>
                        <tr>
                            <td><?= $r->getNome(); ?></td>
                            <td><?= $r->getDate(); ?></td>
                            <td><?= $r->getDatefim(); ?></td>
                            <td><?= $r->getHoras()?></td>
                            <td><?= $r->getDescricao(); ?></td>
                            <td>
                                <a class="btn btn-success" href="<?= base_url('comissaopessoa/vizualizar/' . $r->getId()); ?>">
                                    <i class="fas fa-eye"></i> Membros
                                </a>
                                <a class="btn btn-warning" href="<?= base_url('deletecomissao/reativa/' . $r->getId()); ?>">
                                    <i class="fas fa-check-double"></i> Reativar
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
     <br>
    </div>
        <?php
     } ?>
   




<script type="text/javascript">
     let table = $('#tabelaComissao').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            }, 'colvis',
        ],
        columnDefs: [ {
            targets: 0,
            visible: true
        } ]
    } );
</script>

<script type="text/javascript">
    
    $(document).ready(function () {
    $("#flash-msg").delay(3000).fadeOut("slow"); });

</script>