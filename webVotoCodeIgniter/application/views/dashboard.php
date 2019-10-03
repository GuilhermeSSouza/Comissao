
<br>

<div id="painelReunioes">

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
                        <th scope="col">Data</th>
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
                            <td><?= $r->getHoras()?></td>
                            <td><?= $r->getDescricao(); ?></td>
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