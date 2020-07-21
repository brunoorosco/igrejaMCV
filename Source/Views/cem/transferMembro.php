<?php $v->layout("theme/sidebar"); ?>

<?php $v->start("css"); ?>
<link href="<?= asset('css/message.css') ?>" rel="stylesheet">
<link href="<?= asset('css/dashboard.css') ?>" rel="stylesheet">
<link rel="stylesheet" href="<?= asset('css/datatables.css'); ?>">

<?php $v->end(); ?>

<div class="container">

    <div class="">
        <div class="mt-5">
            <form action="<?= url('membro/' . $link) ?>" autoComplete="off" id="transferMembro">
                <div class="login_form_callback w-50 m-auto ">
                    <?= flash(); ?>
                </div>
                <input hidden name="id" value="<?= ((!isset($membro->id)) ? "" : $membro->id) ?>" />
                <div class="card w-50 m-auto">
                    <div class="card-header">
                        <h4 class="pt-2">Transferência de Membro</h4>
                    </div>
                    <div class="card-body ">
                        <div class="row form-group">
                            <div class="col">

                                <span class=" control-span">Membro</span>
                                <input disabled name="nome" class="form-control" value="<?= ((!isset($membro->nome)) ? "" : $membro->nome) ?>" />


                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="chkIgreja">
                                    <label class="form-check-label" for="chkIgreja">Transferência de Igreja</label>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <span class="">Igreja de destino</span>
                                <?php $status = ((!isset($membro->igreja)) ? '0' : $membro->igreja); ?>
                                <select disabled class="custom-select mr-sm-2" name="igreja" id="selIgreja">

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
                        <div class="row form-group">
                            <div class="col">
                                <div class="form-check">
                                    <input type="checkbox" checked class="form-check-input" id="chkCem">
                                    <label class="form-check-label" for="chkCem">Transferência de CEM</label>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <span class="">C.E.M. de destino</span>
                                <?php $status = ((!isset($membro->supervisao)) ? '0' : $membro->supervisao); ?>
                                <select class="custom-select mr-sm-2" name="igreja" id="selCem">

                                    <option value='0' disabled <?php if ($status == "0") echo "selected"; ?>>Escolha um Opção</option>
                                    <?php
                                    foreach ($cems as $cem) :
                                    ?>
                                        <option value="<?= $cem->id ?>" <?php if ($status == $cem->id) echo "selected"; ?>>
                                            <?= $cem->nome_cem ?>
                                        </option>
                                    <?php
                                    endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col">
                                <button type="submit" class="btn btn-success w-50 ">Concluir Transferência</button>
                                <a type="button" class="btn btn-outline-dark w-25" href="<?= url('membro') ?>">Voltar</a>

                            </div>
                        </div>

                    </div>
            </form>
        </div>

    </div>
</div>

<?php $v->start("js"); ?>

<script src="<?= asset('js/transferenciaMembro.js') ?>"></script>


<?php $v->end(); ?>