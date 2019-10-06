
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
    if ($pessoa !=  null) {
        ?>
        <div id="comissaoTable" class="card">
            <div class="card-header">
                <h4>Membros:     <?= $comissao[0]->getNome()?> </h4>
            </div>
            <br>
            <div class="table-responsive">
                <table id=" " class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Siape</th>
                        <th scope="col">Curso/Setor</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($pessoa as $r) { ?>
                        <tr>
                            <td><?= $r->getNome(); ?></td>
                            <td><?= $r->getSiape(); ?></td>
                            <td><?= $r->getCurso(); ?></td>
                            <td><?= $r->getCategoria()?></td>
                            <td>
                                <a class="btn btn-warning" href="<?= base_url('editar/editarMembro/' . $r->getId().'/'.$comissao[0]->getId()); ?>">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <a class="btn btn-danger" href="<?= base_url('comissaopessoa/excluir/'.$comissao[0]->getId(). '/'. $r->getId()); ?>">
                                    <i class="fas fa-trash"></i> Excluir
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
    <br>
</div>


<div id="painelMembro">

    <?php
    if ($novomembro !=  null) {
        ?>
        <div id="membroTable" class="card">
            <div class="card-header">
                <h4>Adicionar Membros:     <?= $comissao[0]->getNome()?> </h4>
            </div>
            <br>
            <div class="table-responsive">
                <table id="" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Siape</th>
                        <th scope="col">Curso/Setor</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($novomembro as $r) { ?>
                        <tr>
                            <td><?= $r->getNome(); ?></td>
                            <td><?= $r->getSiape(); ?></td>
                            <td><?= $r->getCurso(); ?></td>
                            <td><?= $r->getCategoria()?></td>
                            <td><a class="btn btn-success" href="<?= base_url('comissaopessoa/novomembrocomissao/'.$comissao[0]->getId().'/'. $r->getId()); ?>">
                                         <i class="fas fa-plus"></i> Adicionar
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
    $(document).ready(function() {
        $('table.display').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ],
        columnDefs: [ {
            targets: 0,
            visible: true
        } ]
    } );        
    });
    
     
     
</script>

<script type="text/javascript">
    
    $(document).ready(function () {
    $("#flash-msg").delay(3000).fadeOut("slow"); });

</script>