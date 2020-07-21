<?php $v->layout("theme/sidebar"); ?>

<?php $v->start("css"); ?>
<link rel="stylesheet" href="<?= asset('css/datatables.css'); ?>">

<?php $v->end(); ?>

<div class="container">
    <div class="ajax_load"></div>

    <div class="row">
        <div class="col-lg-12">
            <nav class="navbar ">
                <a class="navbar-brand">
                    <h4>Batismo</h4>
                </a>
                <a class="btn btn-sm btn-primary " href="<?= url("batismo/add"); ?>"> <i class="fa fa-plus"></i> Novo Batismo</a>

            </nav>
            <div class="">
                <div class="">
                    
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Quant. Batizando</th>
                                <th>Data</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($batismo as $bat) :
                            ?>

                                <tr>
                                    <td class="text-left" scope="row"><?= $bat->id ?></td>
                                    <td class="text-left" scope="row"><?= "inserir quantidade" ?></td>
                                    <td class="text-left" scope="row"><?= $bat->inicioevento ?></td>
                                    <td>
                                        <a data-action="<?= url("batismo/editar") ?>" data-id=<?= $bat->id ?>>
                                            <i class="fa fa-pencil text-navy"></i>
                                        </a>
                                        <a data-action="<?= url("batismo/excluir") ?>" data-id=<?= $bat->id ?> data-func="exc">
                                            <i class="fa fa-trash text-navy"></i>
                                        </a>
                                        <!-- <a href="<?= url("comp/") . $bat->id ?>/excluir">
                                        <i class="fa fa-trash text-navy"></i>
                                    </a> -->
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
<script src="js/sweetalert.min.js"></script>
<script src="js/datatables.min.js"></script>
<script src="js/tabela.js"></script>

<?php $v->end(); ?>