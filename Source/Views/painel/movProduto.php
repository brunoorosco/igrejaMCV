<?php $v->layout("theme/sidebar"); ?>

<?php $v->start("css"); ?>
<link href="<?= asset('css/message.css') ?>" rel="stylesheet">
<link href="<?= asset('css/dashboard.css') ?>" rel="stylesheet">
<link rel="stylesheet" href="<?= asset('css/datatables.css'); ?>">

<?php $v->end(); ?>

<div class="container-fluid">

    <div class="">
        <div class="mt-5">
            <form action="<?= url('produtos/' . $link) ?>" autoComplete="off">
                <div class="login_form_callback w-50 m-auto ">
                    <?= flash(); ?>
                </div>
                <input hidden name="id" value="<?= ((!isset($produto->id)) ? "" : $produto->id) ?>" />
                <div class="card w-50 m-auto">
                    <div class="card-header">
                        <h4 class="pt-2"><?= $status ?></h4>
                    </div>
                    <div class="card-body ">
                        <div class="row form-group">
                            <div class="col">
                                <span class="">Produto</span>
                                <select class="custom-select mr-sm-2" name="produto">
                                    <option value='0' disabled selected>Escolha um Opção</option>
                                    <?php foreach ($produtos as $produto) : ?>
                                        <option value='<?= $produto->id ?>'><?= $produto->nome ?></option>

                                    <?php
                                    endforeach; ?>
                                </select>
                            </div>
                            <div class="col-3">
                                <span class=" control-span">Quantidade</span>
                                <input name="quantidade" maxlength="4" class="form-control" type="number" />
                            </div>

                        </div>
                        <div class="row form-group">
                            <div class="col-4">
                                <span class=" control-span">Saldo Atual</span>
                                <input disabled class="form-control" value="<?= ((!isset($produto->estoque)) ? "" : $produto->estoque) ?>" />
                            </div>
                            <div class="col-4">
                                <span class="texto">Estoque Futuro</span>
                                <input disabled class="form-control" value="<?= (!isset($produto->estoque)) ?  "" :  $produto->estoque ?>" />
                            </div>
                        </div>
                        <div class="row form-group pl-3">

                            <button type="submit" class="btn btn-success w-25 mr-2"><?= $button ?></button>

                            <a type="button" class="btn btn-outline-dark w-25" href="<?= url('produtos') ?>">Voltar</a>

                        </div>
                    </div>

                </div>
            </form>
        </div>

    </div>
</div>

<?php $v->start("js"); ?>
<script src="<?= asset('js/maskara.js') ?>"></script>


<?php $v->end(); ?>