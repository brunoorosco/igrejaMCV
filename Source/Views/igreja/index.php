<?php $v->layout("theme/sidebar"); ?>

<?php $v->start("css"); ?>

<link rel="stylesheet" href="<?= asset('css/igreja.css'); ?>">

<?php $v->end(); ?>


<div class="container-fluid">
    <div class="ajax_load"></div>

    <div class="row">
        <div class="col-lg-12">

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Igrejas</h5>
                </div>
                <div class="igreja-content">
                    <ul>
                        <?php
                        foreach ($igrejas as $igreja) :
                        ?>
                            <li key="<?= $igreja->id ?>">
                                <strong>Igreja:</strong>
                                <p><?= $igreja->igreja ?></p>

                                <strong>Endereço:</strong>
                                <p><?= $igreja->endereco . ', ' . $igreja->numero . ', ' . $igreja->bairro . ' - ' . $igreja->cidade ?></p>

                                <div class="row">
                                    <div class="col ">
                                        <strong>Responsável:</strong>
                                        <p><?= $igreja->igreja ?></p>
                                    </div>
                                    <div class="col text-center">
                                        <strong>Abertura:</strong>
                                        <p><?= $igreja->abertura ?></p>
                                    </div>
                                </div>
                                <button class="delete" type="button">
                                    <i class="fa fa-trash text-navy"></i>
                                </button>
                                <button class="edit" type="button">
                                    <i class="fa fa-edit text-navy"></i>
                                </button>
                            </li>
                        <?php
                        endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $v->start("js"); ?>
<script src="<?= asset('js/datatables.min.js') ?>"></script>
<script src="<?= asset('js/tabela.js') ?>"></script>
<?php $v->end(); ?>