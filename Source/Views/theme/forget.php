<?php $v->layout("theme/_theme"); ?>

<?php $v->start("css"); ?>

<link href="<?= asset('css/message.css') ?>" rel="stylesheet">
<link href="<?= asset('css/form.css') ?>" rel="stylesheet">
<link href="<?= asset('css/load.css') ?>" rel="stylesheet">


<?php $v->end(); ?>


<div class="container">
    <div class="form-fundo  text-white py-4 mt-5">

        <h3 class="title">Recuperação da Senha</h3>
        <div class="form-geral">

            <div class="login_form_callback">
                <?= flash(); ?>
            </div>
            <form class="form" action="<?= $router->route("auth.forget"); ?>" method="post" autocomplete="off">
                <div class="form-group">
                    <input value="" class="form-control" type="email" name="email" placeholder="Informe seu e-mail:" />
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block">Recuperar Senha</button>
                </div>
            </form>

            <div class="form_register_action">
                <p class="rec-text">Você também pode:</p>
                <a href="<?= $router->route("web.login"); ?>" class="btn btn-outline btn-light">Voltar ao Login</a>
            </div>
        </div>

    </div>
</div>

<?php $v->start("scripts"); ?>
<script src="<?= asset("js/form.js"); ?>"></script>
<?php $v->end(); ?>