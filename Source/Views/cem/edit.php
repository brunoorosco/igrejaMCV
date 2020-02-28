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
                        Editar Membro - <?= $member->nome  ?>
                    </h5>

                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="login_form_callback">
                        <?= flash(); ?>
                    </div>
                    <form action="<?= url('minhacem/edit') ?>" method="post" autocomplete="off">

                        <input hidden name="idmembros" value="<?= $member->idmembros ?>" />
                        <div class="card">
                            <div class="card-header">
                                Dados Pessoais
                            </div>
                            <div class="card-body ">
                                <div class="row form-group">
                                    <div class="col">
                                        <span class="">Nome Completo</span>
                                        <input type="text" name="nome" id="nome" value="<?= $member->nome  ?>" placeholder="" class="form-control">
                                    </div>
                                    <div class="col">
                                        <span class=" control-span">E-mail</span>
                                        <input type="text" name="email" maxlength="200" class="form-control" id="email" value="<?= $member->email ?>" />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-3">
                                        <span class="texto">Niver</span>
                                        <input type="text" name="nasc" maxlength="10" class="form-control date" value="<?= date("d/m/Y", strtotime(str_replace('-', '/', $member->nasc))) ?>" />
                                    </div>
                                    <div class="col-3">
                                        <span class="texto">Celular</span>
                                        <input type="text" name="telefone" maxlength="15" class="form-control cel" value="<?= $member->telefone ?>" />
                                    </div>
                                </div>



                                <!-- FORMULÁRIO DE CADASTRO DE EMPRESA -->
                                <div class="row form-group">
                                    <div class="col-3">
                                        <span class="control-span">CEP</span>

                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <input type="text" name="cep" class="form-control cep" id="txt_cep" value="<?= $member->cep  ?>" />
                                                <button class="btn btn-success" id="pesquisar" type="button"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <span id="" class="">Endereço</span>
                                        <input type="text" name="endereco" maxlength="100" class="form-control" id="txt_rua" value="<?= $member->endereco  ?>" />
                                    </div>

                                    <div class="col-2">
                                        <span id="" class="texto">Nº</span>
                                        <input type="text" name="numero" maxlength="10" class="form-control" id="txt_numero" value="<?= $member->numero  ?>" />
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-3">
                                        <span id="" class="texto">Cidade</span>
                                        <input type="text" name="cidade" maxlength="50" class="form-control" id="txt_cidade" value="<?= $member->Cidade ?>" />
                                    </div>

                                    <div class="col-3">
                                        <span id="" class="texto">Bairro</span>
                                        <input type="text" name="bairro" maxlength="50" class="form-control" id="txt_bairro" value="<?= $member->Bairro  ?>" />
                                    </div>

                                    <div class="col-1"><span id="cadEmpresa_tit10" class="texto">UF</span>
                                        <input type="text" name="estado" class="form-control" id="txt_estado" maxlength="2" value="<?= $member->Estado  ?>" />
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
                                        <span id="cadEmpresa_tit12" class="texto">Cargo</span>
                                        <input type="text" name="cargo" maxlength="14" class="form-control" id="txt_cargo" value="<?= $member->cargo ?>" />
                                    </div>
                                    <div class="col">
                                        <span id="cadEmpresa_tit12" class="texto">CEM</span>
                                        <input type="text" name="supervisao" maxlength="14" class="form-control" id="txt_cem" value="<?= $member->supervisao ?>" />
                                    </div>
                                    <div class="col">
                                        <span id="cadEmpresa_tit12" class="texto">Igreja</span>
                                        <input hidden type="text" name="igreja" maxlength="14" class="form-control" value="<?= $member->igreja ?>" />
                                        <input disabled type="text" name="igreja" maxlength="14" class="form-control" value="<?= $member->igreja ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        </br>
                        <div class="card">
                            <div class="card-header">
                                Ministérios
                            </div>
                            <div class="card-body ">

                            </div>
                        </div>
                        </br>
                        <div class="row">
                            <div class="col ">
                                <button type="submit" class="btn btn-success">Atualizar</button>
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