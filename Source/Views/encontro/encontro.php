<?php $v->layout("theme/sidebar"); ?>

<?php $v->start("css"); ?>

<link rel="stylesheet" href="<?= asset('css/datatables.css'); ?>">

<?php $v->end(); ?>

<?php $v->start("php") ?>

<?php $v->end(); ?>

<div class="container">

    <div class="ajax_load"></div>
    <div class="">
        <nav class="row navbar mb-2 justify-content-between">

            <a class="navbar-brand">
                <h5>Encontro / Reencontro</h5>
            </a>
            <a class="btn btn-sm btn-primary my-2 my-sm-0" href="<?= url("encontro/add"); ?>"> <i class="fa fa-plus"></i> Novo Encontro/Reencontro</a>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <div class="ibox float-e-margins">

                <div class="ibox-content">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Encontro / Reencontro</th>
                                <th>Número</th>
                                <th>Data</th>
                                <th>Responsável</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($encontros as $encontro) :

                            ?>

                                <tr>
                                    <td class="text-left" scope="row"><?= $encontro->tipo ?></td>
                                    <td class="text-left" scope="row"><?= $encontro->n_encontro ?></td>
                                    <td class="text-left" scope="row"><?= date("d/m/Y", strtotime(str_replace('-', '/', $encontro->data_inicial))); ?></td>
                                    <td class="text-left" scope="row"><?= $encontro->responsavel ?></td>

                                    <td class="text-left">
                                        <a data-action="<?= url("encontro/edit") ?>" data-id=<?= $encontro->id ?> data-func="edit">
                                            <i class="fa fa-pencil text-navy"></i>
                                        </a>
                                        <a data-action="<?= url("encontro/excluir") ?>" data-id=<?= $encontro->id ?> data-nome=<?= $encontro->tipo .'nº:' .$encontro->n_encontro ?> data-func="exc">
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
<script src="<?= asset('js/sweetalert.min.js') ?>"></script>
<script src="<?= asset('js/datatables.min.js') ?>"></script>
<script src="<?= asset('js/load.js') ?>"></script>
<script src="<?= asset('js/tabela.js') ?>"></script>
<?php $v->end(); ?>