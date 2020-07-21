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
                <h5>Participantes do <?=$encontro?></h5>
            </a>
            <a class="btn btn-sm btn-primary my-2 my-sm-0" href="<?= url("encontrista/add"); ?>"> <i class="fa fa-plus"></i> Novo Encontrista/Reencontrista</a>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <div class="ibox float-e-margins">

                <div class="ibox-content">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>(Re)Encontrista</th>
                                <th>Sexo</th>
                                <th>Telefone</th>

                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($encontristas as $encontrista) :

                            ?>

                                <tr>
                                    <td class="text-left" scope="row"><?= $encontrista->nomeEnc ?></td>
                                    <td class="text-left" scope="row"><?= $encontrista->sexoEnc ?></td>
                                    <td class="text-left" scope="row"><?= $encontrista->telEnc ?></td>


                                    <td class="text-left">
                                        <a data-action="<?= url("encontro/edit") ?>" data-id=<?= $encontrista->idEncontrista ?> data-func="edit">
                                            <i class="fa fa-pencil text-navy"></i>
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