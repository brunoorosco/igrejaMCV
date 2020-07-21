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
                <div class="login_form_callback w-75 m-auto ">
                    <?= flash(); ?>
                </div>
                <input hidden name="id" value="<?= ((!isset($produto->id)) ? "" : $produto->id) ?>" />
                <div class="card w-75 m-auto">
                    <div class="card-header">
                        <h4 class="pt-2"><?= $status ?></h4>
                    </div>
                    <div class="card-body ">
                        <div class="row form-group">
                            <div class="col-3">
                                <span class="">Cód. Produto</span>
                                <?php $status = ((!isset($produto->codigo)) ? '0' : $produto->codigo); ?>
                                <!-- <select class="custom-select mr-sm-2" name="tipo">
                                    <option value='0' disabled <?php if ($status == "0") echo "selected"; ?>>Escolha um Opção</option>
                                    <option value='ENCONTRO' <?php if ($status == "ENCONTRO") echo "selected"; ?>>Encontro </option>
                                    <option value='REENCONTRO' <?php if ($status == "REENCONTRO") echo "selected"; ?>>Reencontro </option>
                                </select> -->

                                <input name="codigo" class="form-control" value="<?= ((!isset($produto->codigo)) ? "" : $produto->codigo) ?>" />
                            </div>
                            <div class="col">
                                <span class=" control-span">Nome</span>
                                <input name="nome" maxlength="50" class="form-control" value="<?= ((!isset($produto->nome)) ? "" : $produto->nome) ?>" />
                            </div>

                        </div>
                        <div class="row form-group">
                            <div class="col-2">
                                <span class=" control-span">Preço de Custo</span>
                                <input name="preco" class="form-control money" value="<?= ((!isset($produto->custo)) ? "" : $produto->custo) ?>" />
                            </div>
                            <div class="col-2">
                                <span class=" control-span">Preço de Venda</span>
                                <input name="preco" class="form-control money" value="<?= ((!isset($produto->preco)) ? "" : $produto->preco) ?>" />
                            </div>
                            <div class="col-2">
                                <span class="texto">Estoque</span>
                                <input name="estoque" maxlength="4" class="form-control" value="<?= (!isset($produto->estoque)) ?  "" :  $produto->estoque ?>" />
                            </div>
                            <div class="col-2">
                                <span class="texto">Est. Min.</span>
                                <input name="estoquemin" class="form-control" value="<?= (!isset($produto->estoquemin)) ?  "" :  $produto->estoquemin ?>" />
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