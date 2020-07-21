<?php $v->layout("theme/sidebar"); ?>

<?php $v->start("css"); ?>

<link rel="stylesheet" href="<?= asset('css/load.css'); ?>">
<link rel="stylesheet" href="<?= asset('css/message.css'); ?>">

<?php $v->end(); ?>

<div class="container-fluid">

    <div class="ajax_load"></div>

    <div class="login_form_callback">
        <?= flash(); ?>
    </div>



</div>

<?php $v->start("js"); ?>
<script src="<?= asset('js/sweetalert.min.js') ?>"></script>
<script src="<?= asset('js/load.js') ?>"></script>


<?php $v->end(); ?>