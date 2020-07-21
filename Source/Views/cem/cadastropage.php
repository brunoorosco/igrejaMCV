<?php $v->layout("theme/sidebar"); ?>

<?php $v->start("css"); ?>
<link href="<?= asset('css/message.css') ?>" rel="stylesheet">
<link href="<?= asset('css/dashboard.css') ?>" rel="stylesheet">
<link rel="stylesheet" href="<?= asset('css/datatables.css'); ?>">

<?php $v->end(); ?>

<div class="container">

    <div class="">
        <div class="mt-5">
            <form action="<?= url('encontro/' . $link) ?>" autoComplete="off">
                <div class="login_form_callback w-50 m-auto ">
                    <?= flash(); ?>
                </div>
                <input hidden name="id" value="<?= ((!isset($encontro->id)) ? "" : $encontro->id) ?>" />
                <div class="card w-50 m-auto">
                    <div class="card-header">
                        <h4 class="pt-2"><?= $status ?></h4>
                    </div>
                    <div class="card-body ">
                        <div class="row form-group">
                            <div class="col">
                                <span class="">Tipo de Evento</span>
                                <?php $status = ((!isset($encontro->tipo)) ? '0' : $encontro->tipo); ?>
                                <select class="custom-select mr-sm-2" name="tipo">
                                    <option value='0' disabled <?php if ($status == "0") echo "selected"; ?>>Escolha um Opção</option>
                                    <option value='ENCONTRO' <?php if ($status == "ENCONTRO") echo "selected"; ?>>Encontro </option>
                                    <option value='REENCONTRO' <?php if ($status == "REENCONTRO") echo "selected"; ?>>Reencontro </option>
                                </select>
                            </div>
                            <div class="col-4">
                                <span class=" control-span">Número</span>
                                <input name="n_encontro" maxlength="3" class="form-control" value="<?= ((!isset($encontro->n_encontro)) ? "" : $encontro->n_encontro) ?>" />
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-5">
                                <span class="texto">Data de Início</span>
                                <input type="date" name="data_inicial" maxlength="10" class="form-control" value="<?= (!isset($encontro->data_inicial)) ?  "" : date("Y-m-d", strtotime(str_replace('-', '/', $encontro->data_inicial))) ?>" />
                            </div>
                            <div class="col">
                                <span class=" control-span">Responsável</span>
                                <input name="responsavel" maxlength="25" class="form-control" value="<?= ((!isset($encontro->responsavel)) ? "" : $encontro->responsavel) ?>" />
                            </div>
                        </div>
                        <div class="row form-group pl-3">

                            <button type="submit" class="btn btn-success w-25 "><?= $button ?></button>

                            <a type="button" class="btn btn-outline-dark w-25" href="<?= url('encontro') ?>">Voltar</a>

                        </div>
                    </div>

                </div>
            </form>
        </div>

    </div>
</div>

<?php $v->start("js"); ?>


<?php $v->end(); ?>