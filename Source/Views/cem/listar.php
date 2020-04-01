<?php $v->layout("theme/sidebar"); ?>

<?php $v->start("css"); ?>

<link rel="stylesheet" href="<?= asset('css/datatables.css'); ?>">

<?php $v->end(); ?>

<?php $v->start("php")?>
        <a type="button" class="btn btn-primary">Novo</a>
<?php $v->end(); ?>

<div class="container-fluid">
       <div class="row">
        <div class="col-lg-12">

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Membros</h5>

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

                    <table class="table" id="tabelaMembers">
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

                                        <a data-action="<?= url("minhacem/edit") ?>" data-id=<?= $member->idmembros ?> data-func="edit">
                                            <i class="fa fa-pencil text-navy"></i>
                                        </a>
                                        <a data-action="<?= url("minhacem/excluir") ?>" data-id=<?= $member->idmembros ?> data-nome=<?= $member->nome ?> data-func="exc">
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