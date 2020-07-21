<?php $v->layout("theme/sidebar"); ?>
<!-- CADASTRO DE EMPRESAS -->

<?php $v->start("css"); ?>

<link rel="stylesheet" href="<?= asset('css/form.css'); ?>">
<link rel="stylesheet" href="<?= asset('css/load.css'); ?>">
<link rel="stylesheet" href="<?= asset('css/message.css'); ?>">

<?php $v->end(); ?>



<div class="container">

    <div class="col-lg-12">
        <div class="ibox-content">
            <div class="login_form_callback">
                <?= flash(); ?>
            </div>
            <form action="<?= url('cem/' . $link) ?>" method="PUT" autocomplete="off">

                <input hidden name="idCem" value="<?= ((!isset($cem->id)) ? "" : $cem->id) ?>" />
                <div class="card mt-5">
                    <div class="card-header">
                        <strong><?= $status ?></strong>
                    </div>
                    <div class="card-body ">
                        <div class="row form-group">
                            <div class="col-4">
                                <span class="">Igreja</span>

                                <div class="input-group">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" sytle="border-left-radius: 10px !important;" id="pesquisar" type="button">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>

                                    <?php $status = ((!isset($cem->igreja)) ? '0' : $cem->igreja); ?>
                                    <select class="custom-select" name="igreja" id="selIgreja">

                                        <option value='0' disabled <?php if ($status == "0") echo "selected"; ?>>Escolha um Opção</option>
                                        <?php
                                        foreach ($igrejas as $igreja) :
                                        ?>
                                            <option value="<?= $igreja->id ?>" <?php if ($status == $igreja->id) echo "selected"; ?>>
                                                <?= $igreja->igreja ?>
                                            </option>
                                        <?php
                                        endforeach; ?>
                                    </select>
                                </div>

                            </div>

                            <div class="col">
                                <span class=" control-span">Nome do Responsável</span>
                                <input name="tema" maxlength="200" class="form-control" value="<?= ((!isset($cem->tema)) ? "" : $cem->tema) ?>" />
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-3">
                                <span class="control-span">CEP</span>

                                <div class="input-group">
                                    <input name="cep" class="form-control cep" id="txt_cep" value="<?= ((!isset($member->cep)) ? "" : $member->cep) ?>" />
                                    <div class="input-group-append">
                                        <button class="btn btn-success" id="pesquisar" type="button"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <span class="">Endereço</span>
                                <input name="endereco" maxlength="100" id="txt_rua" class="form-control" value="<?= ((!isset($member->endereco)) ? "" : $member->endereco) ?>" />
                            </div>

                            <div class="col-2">
                                <span class="texto">Nº</span>
                                <input name="numero" maxlength="10" class="form-control" value="<?= ((!isset($member->numero)) ? "" : $member->numero) ?>" />
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-3">
                                <span class="texto">Cidade</span>
                                <input name="city" id="txt_cidade" maxlength="50" class="form-control" value="<?= ((!isset($member->city)) ? "" : $member->city) ?>" />
                            </div>

                            <div class="col-3">
                                <span class="texto">Bairro</span>
                                <input name="bairro" maxlength="50" class="form-control" id="txt_bairro" value="<?= ((!isset($member->bairro)) ? "" : $member->bairro) ?>" />
                            </div>

                            <div class="col-1"><span class="texto">UF</span>
                                <input name="uf" id="txt_uf" class="form-control" value="<?= ((!isset($member->uf)) ? "" : $member->uf) ?>" maxlength="2" />
                            </div>
                        </div>
                        <br>
                        <div class="row mb-3">
                            <div class="col ">
                                <button type="submit" class="btn btn-success w-25"><?= $button ?></button>
                                <a type="button" class="btn btn-outline-dark w-25" href="<?= url('cursos') ?>">Voltar</a>
                            </div>
                        </div>
                    </div>




            </form>
        </div>

    </div>


    <?php $v->start("js"); ?>
    <script src="<?= asset('js/maskara.js') ?>"></script>
    <script src="<?= asset('js/validacao.js') ?>"></script>
    <script src="<?= asset('js/cep.js') ?>"></script>


    <?php $v->end(); ?>