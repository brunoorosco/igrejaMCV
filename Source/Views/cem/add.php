<?php $v->layout("theme/sidebar"); ?>
<!-- CADASTRO DE EMPRESAS -->

<?php $v->start("css"); ?>

<link rel="stylesheet" href="<?= asset('css/form.css'); ?>">
<link rel="stylesheet" href="<?= asset('css/load.css'); ?>">
<link rel="stylesheet" href="<?= asset('css/message.css'); ?>">

<?php $v->end(); ?>



<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>
                        Novo Membro
                    </h5>
                   
                </div>
                <div class="ibox-content">
                    <div class="login_form_callback">
                        <?= flash(); ?>
                    </div>
                    <form action="<?= url('minhacem/create') ?>" method="post" autocomplete="off">

                        <input hidden name="idmembros" value="" />
                        <div class="card">
                            <div class="card-header">
                                Dados Pessoais
                            </div>
                            <div class="card-body ">
                                <div class="row form-group">
                                    <div class="col">
                                        <span class="">Nome Completo</span>
                                        <input type="text" name="nome" id="nome"  placeholder="" class="form-control">
                                    </div>
                                    <div class="col">
                                        <span class=" control-span">E-mail</span>
                                        <input type="text" name="email" maxlength="200" class="form-control" id="email"  />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-3">
                                        <span class="texto">Niver</span>
                                        <input type="text" name="nasc" maxlength="10" class="form-control date"  />
                                    </div>
                                    <div class="col-3">
                                        <span class="texto">Celular</span>
                                        <input type="text" name="telefone" maxlength="15" class="form-control cel"  />
                                    </div>
                                </div>



                                <!-- FORMULÁRIO DE CADASTRO DE EMPRESA -->
                                <div class="row form-group">
                                    <div class="col-3">
                                        <span class="control-span">CEP</span>

                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <input type="text" name="cep" class="form-control cep" id="txt_cep"  />
                                                <button class="btn btn-success" id="pesquisar" type="button"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <span id="" class="">Endereço</span>
                                        <input type="text" name="endereco" maxlength="100" class="form-control" id="txt_rua"  />
                                    </div>

                                    <div class="col-2">
                                        <span id="" class="texto">Nº</span>
                                        <input type="text" name="numero" maxlength="10" class="form-control" id="txt_numero"  />
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-3">
                                        <span class="texto">Cidade</span>
                                        <input type="text" name="cidade" maxlength="50" class="form-control"  id="txt_cidade" />
                                    </div>

                                    <div class="col-3">
                                        <span class="texto">Bairro</span>
                                        <input type="text" name="bairro" maxlength="50" class="form-control" id="txt_bairro" />
                                    </div>

                                    <div class="col-1"><span id="cadEmpresa_tit10" class="texto">UF</span>
                                        <input type="text" name="estado" class="form-control" id="txt_estado" maxlength="2" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                Dados da Igreja
                            </div>
                            <div class="card-body ">
                                <div class="row form-group">
                                    <div class="col">
                                        <span class="texto">Cargo</span>
                                        <input type="text" name="cargo" maxlength="14" class="form-control" id="txt_cargo" />
                                    </div>
                                    <div class="col">
                                        <span class="texto">CEM</span>
                                        <input type="text" name="supervisao"  class="form-control" id="txt_cem" value="<?=  $_SESSION["cem"] ?>" disabled />
                                    </div>
                                    <div class="col">
                                        <span class="texto">Igreja</span>
                                        <input hidden type="text" name="igreja" maxlength="14" class="form-control" value="<?=  $_SESSION["igreja"] ?>" />
                                        <input disabled type="text" name="igreja" maxlength="14" class="form-control" value="<?=  $_SESSION["igreja"] ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        </br>
                    
                        <div class="row">
                            <div class="col ">
                                <button type="submit" class="btn btn-success">Enviar</button>
                                <a type="button" class="btn btn-light" href="<?= url('minhacem') ?>">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $v->start("js"); ?>
<script src="<?= asset('js/maskara.js') ?>"></script>
<script src="<?= asset('js/validacao.js') ?>"></script>
<script src="<?= asset('js/cep.js') ?>"></script>

<?php $v->end(); ?>