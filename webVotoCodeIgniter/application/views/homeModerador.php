
<br>
<div>
    <h3> Moderando a <?= $reuniao->getNome(); ?> </h3>

    <div id="itensPauta" class="card">
        <div class="card-header">
        	<div style="float:left">
            <h4>Itens de Pauta</h4>
            <p>Adicionar Opções de Voto e encaminar para votação</p>
          </div>
          <div style="float: right">
          	<a href="<?=base_url('reunioes/fechar/'.$reuniao->getId())?>" class="btn btn-danger"> Fechar </a>
          </div>
        </div>
        <br>
        <div class="table-responsive">
            <table id="tabelaItensPauta" class="table">
                <thead>
                <tr>
                    <th scope="col">Descrição</th>
                    <th scope="col">Relator</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($reuniao->getItensPauta() as $i) { ?>
                    <tr>
                        <td><?= $i->getDescricao(); ?></td>
                        <td><?= $i->getRelator(); ?></td>
                        <td>
                            <a class="btn btn-success" href="<?= base_url('itensPauta/editar/' . $i->getId()); ?>">
                                <i class="fas fa-external-link-alt"></i>Editar e Encaminhar
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <br>

</div>
