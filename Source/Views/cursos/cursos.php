<?php $v->layout("theme/sidebar"); ?>

<?php $v->start("css"); ?>
<link href="<?= asset('css/message.css') ?>" rel="stylesheet">
<link href="<?= asset('css/dashboard.css') ?>" rel="stylesheet">

<?php $v->end(); ?>

<div class="page">
    <div class="ajax_load"></div>
    <div class="container-fluid">
        <div class="row m-0">
            <div class="col col-6 col-sm-4 col-md-3 p-3 col-lg-5-12">
                <div class="widget-box cursor-pointer">
                    <a href="<?= url("minhacem") ?>" class="widget-box__link" target="">
                        <div class="widget-box__content">
                            <span class="widget-box__subtitle text-center">
                                <span>Novo Curso</span>
                            </span>
                            <span class="widget-box__counter text-center">
                                <span></span>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col col-6 col-sm-4 col-md-3 p-3 col-lg-5-12">
                <div class="widget-box cursor-pointer">
                    <a href="" class="widget-box__link" target="">
                        <div class="widget-box__content">

                            <span class="widget-box__subtitle text-center">
                                <span>Editar Curso</span>
                            </span>
                            <span class="widget-box__counter text-center">
                                <span></span>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col col-6 col-sm-4 col-md-3 p-3 col-lg-5-12">
                <div class="widget-box cursor-pointer">
                    <a href="" class="widget-box__link" target="">
                        <div class="widget-box__content">

                            <span class="widget-box__subtitle text-center">
                                <span>Excluir</span>
                            </span>
                            <span class="widget-box__counter text-center">
                                <span></span>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col col-6 col-sm-4 col-md-3 p-3 col-lg-5-12">
                <div class="widget-box cursor-pointer">
                    <a href="" class="widget-box__link" target="">
                        <div class="widget-box__content">

                            <span class="widget-box__subtitle text-center">
                                <span>Casa de Paz</span>
                            </span>
                            <span class="widget-box__counter text-center">
                                <span></span>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class=" m-0">
            <div class="ibox float-e-margins ">
                <div class="ibox-title">
                    <h5>Cursos</h5>
                </div>
                <div class="ibox-content">

                    <table class="table" id="tabelaMembers">
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

                                        <a data-action="<?= url("minhacem/edit") ?>" data-id=<?= $course->idmembros ?> data-func="edit">
                                            <i class="fa fa-pencil text-navy"></i>
                                        </a>
                                        <a data-action="<?= url("minhacem/excluir") ?>" data-id=<?= $course->idmembros ?> data-nome=<?= $course->nome ?> data-func="exc">
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
<p><a class="btn btn-green" href="<?= $router->route("app.logoff"); ?>" title="Sair agora">SAIR AGORA :)</a></p>
</div>