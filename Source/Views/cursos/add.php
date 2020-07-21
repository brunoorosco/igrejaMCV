<?php $v->layout("theme/sidebar"); ?>
<!-- CADASTRO DE EMPRESAS -->

<?php $v->start("css"); ?>

<link rel="stylesheet" href="<?= asset('css/form.css'); ?>">
<link rel="stylesheet" href="<?= asset('css/load.css'); ?>">
<link rel="stylesheet" href="<?= asset('css/message.css'); ?>">

<?php $v->end(); ?>



<div class="container">
  
        <div class="col-lg-12">
        <nav class="navbar mb-2">
                <a class="navbar-brand">
                    <h4><?= $status ?></h4>
                </a>
                <a class="btn btn-primary my-2 my-sm-0" href="<?= $router->route("app.logoff"); ?>"> <i class="fa fa-power-off"></i> Sair</a>
            </nav>
            <div class="ibox-content">
                <div class="login_form_callback">
                    <?= flash(); ?>
                </div>
                <form action="<?= url('cursos/' . $link) ?>" method="PUT" autocomplete="off">

                    <input hidden name="idCursos" value="<?= ((!isset($curso->idCursos)) ? "" : $curso->idCursos) ?>" />
                    <div class="card">
                        <div class="card-header">
                            <strong><?= $status ?></strong>
                        </div>
                        <div class="card-body ">
                            <div class="row form-group">
                                <div class="col-3">
                                    <span class="">Tipo de Curso</span>
                                    <?php $status = ((!isset($curso->nomeCursos)) ? '0' : $curso->nomeCursos); ?>
                                    <select class="custom-select mr-sm-2" name="nomeCursos">
                                        <option value='0' disabled <?php if ($status == "0") echo "selected"; ?>>Escolha um Opção</option>
                                        <option value='DISCIPULADO' <?php if ($status == "DISCIPULADO") echo "selected"; ?>>DISCIPULADO </option>
                                        <option value='ESCOLA DE PROFETA' <?php if ($status == "ESCOLA DE PROFETA") echo "selected"; ?>>ESCOLA DE PROFETA </option>
                                    </select>
                                </div>
                                <div class="col">
                                    <span class=" control-span">Nome do Curso ou Aula</span>
                                    <input name="tema" maxlength="200" class="form-control" value="<?= ((!isset($curso->tema)) ? "" : $curso->tema) ?>" />
                                </div>
                                <div class="col-3">
                                    <span class="texto">Data de Início</span>
                                    <input type="date" name="data_" maxlength="10" class="form-control" 
                                    value="<?=  (!isset($curso->data_)) ?  "" :date("Y-m-d", strtotime(str_replace('-', '/', $curso->data_)))?>" />
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                Alunos
                            </div>
                            <div class="card-body ">
                                <div class="row form-group">
                                    <div class="col">
                                        <span class="texto">Cargo</span>
                                        <?php
                                        if ($disable === "disabled") {
                                        ?>
                                            <input type="text" name="cargo" disabled maxlength="14" class="form-control" value="<?= ((!isset($curso->cargo)) ? "" : $curso->cargo) ?>" required />
                                        <?php
                                        } else {
                                        ?>
                                            <select class="custom-select mr-sm-2" name="cargo">
                                                <option selected disabled>Cargo</option>
                                                <?php
                                                foreach ($cargos as $cargo) : ?>
                                                    <option value="<?= $cargo->id ?>"><?= $cargo->cargo ?></option>
                                                <?php
                                                endforeach; ?>
                                            </select>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col">
                                        <span class="texto">CEM</span>
                                        <input type="text" name="supervisao" class="form-control" id="txt_cem" value="<?= $_SESSION["cem"] ?>" disabled />
                                    </div>
                                    <div class="col">
                                        <span class="texto">Igreja</span>
                                        <input hidden type="text" name="igreja" maxlength="14" class="form-control" value="<?= $_SESSION["igreja"] ?>" />
                                        <input disabled type="text" name="igreja" maxlength="14" class="form-control" value="<?= $_SESSION["igreja"] ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col ">
                            <button type="submit" class="btn btn-success w-25"><?= $button ?></button>
                            <a type="button" class="btn btn-outline-dark w-25" href="<?= url('cursos') ?>">Voltar</a>
                        </div>
                    </div>
                </form>
            </div>
   
</div>


<?php $v->start("js"); ?>
<script src="<?= asset('js/maskara.js') ?>"></script>
<script src="<?= asset('js/validacao.js') ?>"></script>


<?php $v->end(); ?>