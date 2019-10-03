
<br>

<div id="painelReunioes">

    <?php
    if (sizeof($membro) > 0) {
        ?>
        <div id="reunioesMembro" class="card">
            <div class="card-header">
                <h4>Membro</h4>
            </div>
            <br>
            <div class="table-responsive">
                <table id="tabelaMembro" class="table">
                    <thead>
                    <tr>
                        <th scope="col">Descrição</th>
                        <th scope="col">Data</th>
                        <th scope="col">Comissão</th>
                        <th scope="col">Tipo</th>
                        <th>Situação</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($membro as $r) { ?>
                        <tr>
                            <td><?= $r->getNome(); ?></td>
                            <td><?= $r->getDataHora(); ?></td>
                            <td><?= $r->getComissao()->getNome(); ?></td>
                            <td><?= $r->getTipo(); ?></td>
                            <td><?= $r->getAberta() ? 'Aberta' : 'Fechada'; ?></td>
                            <td>
                                <a class="btn btn-success" href="<?= base_url('reunioes/entrar/' . $r->getId()); ?>">
                                    <i class="fas fa-sign-in-alt"></i> Entrar
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


    <?php
    if (sizeof($moderador) > 0) {
        ?>
        <div id="reunioesModerador" class="card">
            <div class="card-header">
                <h4>Moderador</h4>
            </div>
            <br>
            <div class="table-responsive">
                <table id="tabelaModerador" class="table">
                    <thead>
                    <tr>
                        <th scope="col">Descrição</th>
                        <th scope="col">Data</th>
                        <th scope="col">Comissão</th>
                        <th scope="col">Tipo</th>
                        <th>Situação</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($moderador as $r) { ?>
                        <tr>
                            <td><?= $r->getNome(); ?></td>
                            <td><?= $r->getDataHora(); ?></td>
                            <td><?= $r->getComissao()->getNome(); ?></td>
                            <td><?= $r->getTipo(); ?></td>
                            <td><?= $r->getAberta() ? 'Aberta' : 'Fechada'; ?></td>
                            <td>
                                <a class="btn btn-success" href="<?= base_url('reunioes/abrir/' . $r->getId()); ?>">
                                    <i class="fas fa-external-link-alt"></i>
                                    <?php echo($r->getAberta() ? 'Moderar' : 'Abrir'); ?>
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
    }
    ?>

    <?php
    if (sizeof($secretario) > 0) {
        ?>
        <div id="reunioesSecretario" class="card">
            <div class="card-header">
                <h4>Secretario</h4>
            </div>
            <br>
            <div class="table-responsive">
                <table id="tabelaSecretario" class="table">
                    <thead>
                    <tr>
                        <th scope="col">Descrição</th>
                        <th scope="col">Data</th>
                        <th scope="col">Comissão</th>
                        <th scope="col">Tipo</th>
                        <th>Situação</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($secretario as $r) { ?>
                        <tr>
                            <td><?= $r->getNome(); ?></td>
                            <td><?= $r->getDataHora(); ?></td>
                            <td><?= $r->getComissao()->getNome(); ?></td>
                            <td><?= $r->getTipo(); ?></td>
                            <td><?= $r->getAberta() ? 'Aberta' : 'Fechada'; ?></td>
                            <td>
                                <a class="btn btn-success disabled" href="<?= base_url('reunioes/gerenciar/' . $r->getId()); ?>">
                                    <i class="fas fa-wrench"></i> Gerenciar
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    }
    ?>

    <br>
</div>
