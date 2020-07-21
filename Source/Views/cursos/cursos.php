<?php $v->layout("theme/sidebar"); ?>

<?php $v->start("css"); ?>
<link href="<?= asset('css/message.css') ?>" rel="stylesheet">
<link href="<?= asset('css/dashboard.css') ?>" rel="stylesheet">
<link rel="stylesheet" href="<?= asset('css/datatables.css'); ?>">

<?php $v->end(); ?>

<div class="page">
    <div class="ajax_load"></div>
    <div class="container">


        <nav class="navbar navbar-light bg-light mb-2">

            <a class="navbar-brand">
                <h5>Cursos</h5>
            </a>
            <a class="btn btn-sm btn-primary my-2 my-sm-0" href="<?= url("cursos/add"); ?>"> <i class="fa fa-plus"></i> Novo Curso</a>
        </nav>

        <div class=" m-0">
            <div class="ibox float-e-margins ">
                <div class="ibox-content">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Curso</th>
                                <th>Tema</th>
                                <th>Data de Início</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($cursos as $course) :
                            ?>

                                <tr>
                                    <td class="text-left" scope="row"><?= $course->idCursos ?></td>
                                    <td class="text-left" scope="row"><?= $course->nomeCursos ?></td>
                                    <td class="text-left" scope="row"><?= $course->tema ?></td>
                                    <td class="text-left" scope="row"><?= $course->data_ ?></td>

                                    <td class="text-left">

                                        <a data-action="<?= url("cursos/alunos") ?>" data-id="<?= $course->idCursos ?>" data-func="edit">
                                            <i class="fa fa-graduation-cap text-navy"></i>
                                        </a>

                                        <a data-action="<?= url("cursos/edit") ?>" data-id="<?= $course->idCursos ?>" data-func="edit">
                                            <i class="fa fa-pencil text-navy"></i>
                                        </a>
                                        <a data-action="<?= url("cursos/excluir") ?>" data-id="<?= $course->idCursos ?>" data-nome="<?= $course->nomeCursos ?>" data-func="exc">
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