<?php $v->layout("theme/sidebar"); ?>

<?php $v->start("css"); ?>

<link rel="stylesheet" href="<?= asset('css/datatables.css'); ?>">

<?php $v->end(); ?>

<?php $v->start("php") ?>
<button class="">Novo Encontro</button>
<?php $v->end(); ?>

<div class="container-fluid">
    <div class="ajax_load"></div>

    <div class="row">
        <div class="col-lg-12">

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Encontrista</h5>
                </div>
                <div class="ibox-content">

                    <table class="table" id="tabelaMembers">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Encontrista</th>
                                <th>Telefone</th>
                                <th>E-Mail</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($encontristas as $member) :

                            ?>

                                <tr>
                                    <td class="text-left" scope="row"><?= $member->idEncontrista ?></td>
                                    <td class="text-left" scope="row"><?= $member->nomeEnc ?></td>
                                    <td class="text-left" scope="row"><?= $member->telEnc ?></td>
                                    <td class="text-left" scope="row"><?= $member->CEM ?></td>

                                    <td class="text-left">

                                        <a data-action="<?= url("encontro/edit") ?>" data-id=<?= $member->idEncontrista ?> data-func="edit">
                                            <i class="fa fa-pencil text-navy"></i>
                                        </a>
                                        <a data-action="<?= url("encontro/excluir") ?>" data-id=<?= $member->idEncontrista ?> data-nome=<?= $member->nomeEnc ?> data-func="exc">
                                            <i class="fa fa-trash text-navy"></i>
                                        </a>

                                    </td>
                                </tr>

                            <?php
                            endforeach; ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $v->start("js"); ?>
<script src="<?= asset('js/datatables.min.js') ?>"></script>
<script src="<?= asset('js/tabela.js') ?>"></script>
<?php $v->end(); ?>