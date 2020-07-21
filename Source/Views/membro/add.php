<?php $v->layout("theme/sidebar"); ?>
<!-- CADASTRO DE EMPRESAS -->

<?php $v->start("css"); ?>

<link rel="stylesheet" href="<?= asset('css/form.css'); ?>">
<link rel="stylesheet" href="<?= asset('css/load.css'); ?>">
<link rel="stylesheet" href="<?= asset('css/message.css'); ?>">

<?php $v->end(); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-3">

            <div class="login_form_callback">
                <?= flash(); ?>
            </div>
            <form action="<?= url('membros/' . $link) ?>" method="POST" autoComplete="off">

                <input hidden name="id" value="<?= ((!isset($member->idmembros)) ? "" : $member->idmembros) ?>" />
                <div class="card">
                    <div class="card-header">
                        <h5><?= $status ?></h5>
                    </div>
                    <div class="card-body ">
                        <div class="row form-group">
                            <div class="col">
                                <span class="">Nome Completo *</span>
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
                                <input type="date" name="nasc" maxlength="10" class="form-control" value="<?= ((!isset($member->nasc)) ? "" : date("Y-m-d", strtotime(str_replace('-', '/', $member->nasc)))) ?>" />
                            </div>
                            <div class="col-3">
                                <span class="texto">Celular</span>
                                <input type="text" name="telefone" maxlength="15" class="form-control cel" value="<?= ((!isset($member->telefone)) ? "" : $member->telefone) ?>" />
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-3">
                                <span class="control-span">CEP</span>

                                <div class="input-group">
                                    <div class="input-group-append">
                                        <input name="cep" class="form-control cep" id="txt_cep" value="<?= ((!isset($member->cep)) ? "" : $member->cep) ?>" />
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



                        <div class="row form-group">
                            <div class="col">
                                <span class="texto">Cargo *</span>
                                <?php
                                if ($disable === "disabled") {
                                ?>
                                    <input name="cargo" value="<?= ((!isset($cargo->id)) ? "" : $cargo->id) ?>" hidden />
                                    <input disabled class="form-control" value="<?= ((!isset($cargo->cargo)) ? "" : $cargo->cargo) ?>" />
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
                                <input name="supervisao" value="<?= (!isset($cem->id) ? $_SESSION['idCem'] : $cem->id) ?>" hidden />
                                <input class="form-control" value="<?= (!isset($cem->nome_cem) ? $_SESSION['nomeCem'] : $cem->nome_cem) ?>" disabled />
                            </div>
                            <div class="col">
                                <span class="texto">Igreja</span>
                                <input hidden name="igreja" value="<?= (!isset($igreja->id) ? $_SESSION['idIgreja'] : $igreja->id) ?>" />
                                <input disabled class="form-control" value="<?= (!isset($igreja->igreja) ? $_SESSION['igreja'] : $igreja->igreja) ?>" />
                            </div>
                        </div>
                    </div>
                </div>
                </br>

                <div class="row">
                    <div class="col ">
                        <button type="submit" class="btn btn-success w-25"><?= $button ?></button>
                        <a type="button" class="btn btn-outline-dark w-25" href="<?= url('minhacem') ?>">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $v->start("js"); ?>
<script src="<?= asset('js/maskara.js') ?>"></script>
<script src="<?= asset('js/validacao.js') ?>"></script>
<script src="<?= asset('js/cep.js') ?>"></script>

<?php $v->end(); ?>