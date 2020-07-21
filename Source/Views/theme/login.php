<?php $v->layout("theme/_theme"); ?>

<?php $v->start("css"); ?>

<link href="<?= asset('css/message.css') ?>" rel="stylesheet">
<link href="<?= asset('css/form.css') ?>" rel="stylesheet">
<link href="<?= asset('css/load.css') ?>" rel="stylesheet">


<?php $v->end(); ?>


<div class="container">
    <div class="form-fundo  text-white py-4 mt-5">
        <h2 class="title">Portal Comunidade Avivamento </h2>
        <div class="form-geral">

            <div class="login_form_callback">
                <?= flash(); ?>
            </div>
            <form class="form" action="<?= $router->route("auth.login"); ?>" class="justify-content-center" method="post" autocomplete="off">
                <div class="form-group">
                    <!-- <label class="sr-only">Usuário</label> -->
                    <input type="text" name="user" class="form-control" placeholder="Usuário">
                </div>
                <div class="form-group">
                    <!-- <label class="sr-only">Senha</label> -->
                    <input type="password" name="passwd" class="form-control" placeholder="Senha">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                </div>
                <div class="form_actions">
                    <div class="rec">
                        <a href="<?= $router->route("web.forget"); ?>" title="Recuperar Senha">Recuperar Senha</a>
                    </div>
                </div>
            </form>

            <!-- <div class="text-danger " id="error"><?= $error ?></div> -->

        </div>
    </div>

</div>

<?php $v->start("scripts"); ?>

<script src="<?= asset("js/form.js"); ?>"></script>

<?php $v->end(); ?>