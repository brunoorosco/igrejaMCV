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
                        <?= $status ?>
                    </h5>

                </div>
                <div class="ibox-content">
                    <div class="login_form_callback">
                        <?= flash(); ?>
                    </div>
                    <form action="<?= url('membros/' . $link) ?>" method="PUT" autocomplete="off">

                        <input hidden name="idmembros" value="" />
                        <div class="card">
                            <div class="card-header">
                                Dados Pessoais
                            </div>
                            <div class="card-body ">
                                <div class="row form-group">
                                    <div class="col">
                                        <span class="">Nome Completo</span>
                                        <input type="text" name="nome" id="nome" value="<?= ((!isset($member->nome)) ? "" : $member->nome) ?>" class="form-control" required>
                                    </div>
                                    <div class="col">
                                        <span class=" control-span">E-mail</span>
                                        <input type="text" name="email" maxlength="200" class="form-control" id="email" value="<?= ((!isset($member->email)) ? "" : $member->email) ?>" />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-3">
                                        <span class="texto">Niver</span>
                                        <input type="text" name="nasc" maxlength="10" class="form-control date" value="
                                        <?= ((!isset($member->nasc)) ? "" : date("d/m/Y", strtotime(str_replace('-', '/', $member->nasc)))) ?>" />
                                    </div>
                                    <div class="col-3">
                                        <span class="texto">Celular</span>
                                        <input type="text" name="telefone" maxlength="15" class="form-control cel" value="<?= ((!isset($member->telefone)) ? "" : $member->telefone) ?>" />
                                    </div>
                                </div>



                                <!-- FORMULÁRIO DE CADASTRO DE EMPRESA -->
                                <div class="row form-group">
                                    <div class="col-3">
                                        <span class="control-span">CEP</span>

                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <input type="text" name="cep" class="form-control cep" id="txt_cep" />
                                                <button class="btn btn-success" id="pesquisar" type="button"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <span id="" class="">Endereço</span>
                                        <input type="text" name="endereco" maxlength="100" class="form-control" value="<?= ((!isset($member->endereco)) ? "" : $member->endereco) ?>" />
                                    </div>

                                    <div class="col-2">
                                        <span id="" class="texto">Nº</span>
                                        <input type="text" name="numero" maxlength="10" class="form-control" value="<?= ((!isset($member->numero)) ? "" : $member->numero) ?>" />
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-3">
                                        <span class="texto">Cidade</span>
                                        <input type="text" name="cidade" id="txt_cidade" maxlength="50" class="form-control" value="<?= ((!isset($member->city)) ? "" : $member->city) ?>" />
                                    </div>

                                    <div class="col-3">
                                        <span class="texto">Bairro</span>
                                        <input type="text" name="bairro" maxlength="50" class="form-control" id="txt_bairro" value="<?= ((!isset($member->bairro)) ? "" : $member->bairro) ?>" />
                                    </div>

                                    <div class="col-1"><span class="texto">UF</span>
                                        <input type="text" name="estado" id="txt_uf" class="form-control" value="<?= ((!isset($member->uf)) ? "" : $member->uf) ?>" maxlength="2" />
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
                                        <?php
                                            if($disable ==="disabled"){
                                        ?>
                                        <input type="text" name="cargo" disabled maxlength="14" class="form-control" 
                                        value="<?= ((!isset($member->cargo)) ? "" : $member->cargo) ?>" required />
                                        <?php
                                            }else{
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
                        </br>

                        <div class="row">
                            <div class="col ">
                                <button type="submit" class="btn btn-success"><?= $button ?></button>
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