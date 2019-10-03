<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img id="logo" src="<?= base_url('assets/img/icone.png'); ?>" width="30" height="30"
         class="d-inline-block align-top" alt="">
    <span class="navbar-brand"> WebComissao</span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">
        <span class="navbar-text"> <?= $this->session->nome; ?></span>
        <ul class="navbar-nav mr-auto">



            <li class="nav-item">
                <a class="nav-link" href="<?= base_url("login/home/");?>"><span class=" "></span>
                    Home </a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="<?= base_url("comissaopessoa/adicionarComissao/");?>"><span class="fas fa-plus"></span>
                    Nova Comissão</a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="<?= base_url("comissaopessoa/adicionarMembro/");?>"><span class="fas fa-plus"></span>
                    Membros</a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="<?= base_url("busca/index/");?>"><span class="fas fa-search"></span>
                    Pesquisa </a>
            </li>



            <li class="nav-item">
                <a class="nav-link" href="<?= base_url("login/logout/"); ?>"><span class="fas fa-sign-out-alt"></span>
                    Logout</a>
            </li>
        </ul>
    </div>
</nav>

<br>
<?php if ($this->session->flashdata('success')) { ?>
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Sucesso!</strong> <?php echo $this->session->flashdata('success'); ?>
    </div>

<?php } else if ($this->session->flashdata('error')) { ?>

    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Erro!</strong> <?php echo $this->session->flashdata('error'); ?>
    </div>

<?php } else if ($this->session->flashdata('warning')) { ?>

    <div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Atenção!</strong> <?php echo $this->session->flashdata('warning'); ?>
    </div>

<?php } else if ($this->session->flashdata('info')) { ?>

    <div class="alert alert-info">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Aviso!</strong> <?php echo $this->session->flashdata('info'); ?>
    </div>
<?php } ?>
