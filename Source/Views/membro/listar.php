<?php $v->layout("theme/sidebar"); ?>

<?php $v->start("css"); ?>

<link rel="stylesheet" href="<?= asset('css/datatables.css'); ?>">

<?php $v->end(); ?>

<?php $v->start("php") ?>

<?php $v->end(); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <header class="mt-3">
                <h5>Membros</h5>
                <a class="btn btn-outline-primary" href="<?= url("membros/add"); ?>"> <i class="fa fa-plus"></i> Novo Membro</a>
            </header>

            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Membro</th>
                        <th>Telefone</th>
                        <th>E-Mail</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($members as $member) :
                    ?>

                        <tr>
                            <td class="text-left" scope="row"><?= $member->idmembros ?></td>
                            <td class="text-left" scope="row"><?= $member->nome ?></td>
                            <td class="text-left" scope="row"><?= $member->telefone ?></td>
                            <td class="text-left" scope="row"><?= $member->email ?></td>

                            <td class="text-left">

                                <a data-action="<?= url("cem/transfer") ?>" data-id=<?= $member->idmembros ?> data-func="edit">
                                    <i class="fa fa- fa-exchange text-navy"></i>
                                </a>

                                <a data-action="<?= url("membros/edit") ?>" data-id=<?= $member->idmembros ?> data-func="edit">
                                    <i class="fa fa-pencil text-navy"></i>
                                </a>
                                <a data-action="<?= url("membros/excluir") ?>" data-id=<?= $member->idmembros ?> data-nome=<?= $member->nome ?> data-func="exc">
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


<?php $v->start("js"); ?>
<script src="<?= asset('js/sweetalert.min.js') ?>"></script>
<script src="<?= asset('js/datatables.min.js') ?>"></script>
<script src="<?= asset('js/load.js') ?>"></script>
<script src="<?= asset('js/tabela.js') ?>"></script>

<?php $v->end(); ?>