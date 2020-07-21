<?php $v->layout("theme/sidebar"); ?>

<?php $v->start("css"); ?>
<link href="<?= asset('css/message.css') ?>" rel="stylesheet">
<link href="<?= asset('css/dashboard.css') ?>" rel="stylesheet">

<?php $v->end(); ?>

<div class="page">
    <div class="container">
        <nav class="navbar mb-2">
            <a class="navbar-brand">
                <h4>Painel de Controle</h4>
            </a>
        </nav>

        <div class="row m-0">
            <div class="col col-6 col-sm-4 col-md-3 p-3 col-lg-5-12">
                <div class="widget-box cursor-pointer">
                    <a href="<?= url("membros") ?>" class="widget-box__link" target="">
                        <div class="widget-box__content">
                            <span class="widget-box__subtitle text-center">
                                <span>Membros</span>
                            </span>
                            <span class="widget-box__counter text-center">
                                <span><?= $members ?></span>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col col-6 col-sm-4 col-md-3 p-3 col-lg-5-12">
                <div class="widget-box cursor-pointer">
                    <a href="<?= url("encontrista/{$encontro}") ?>" class="widget-box__link" target="">
                        <div class="widget-box__content">

                            <span class="widget-box__subtitle text-center">
                                <span>Encontro Nº <?= $encontro ?></span>
                            </span>
                            <span class="widget-box__counter text-center">
                                <span><?= $encontrista ?></span>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col col-6 col-sm-4 col-md-3 p-3 col-lg-5-12">
                <div class="widget-box cursor-pointer">
                    <a href="<?= url("encontrista/{$reencontro}") ?>" class="widget-box__link" target="">
                        <div class="widget-box__content">

                            <span class="widget-box__subtitle text-center">
                                <span>Reencontro Nº<?= $reencontro ?></span>
                            </span>
                            <span class="widget-box__counter text-center">
                                <span><?= $reencontrista ?></span>
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
                                <span>000</span>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row m-0">
            <div class="col col-6 col-sm-4 col-md-3 p-3 col-lg-5-12">
                <div class="widget-box cursor-pointer">
                    <a href="/hosting/secretariacac.com/order/order-usage" class="widget-box__link" target="">
                        <div class="widget-box__content">

                            <span class="widget-box__subtitle text-center">
                                <span>Discipulado</span>
                            </span>
                            <span class="widget-box__counter text-center">
                                <span>000</span>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col col-6 col-sm-4 col-md-3 p-3 col-lg-5-12">
                <div class="widget-box cursor-pointer">
                    <a href="<?= url("membros/add"); ?>" class="widget-box__link">
                        <div class="widget-box__content">

                            <span class="widget-box__subtitle text-center">
                                <span>Cadastrar</span>
                            </span>
                            <span class="widget-box__counter text-center">
                                <span>Novo Membro</span>
                            </span>
                        </div>
                    </a>
                </div>

            </div>
            <div class="col col-6 col-sm-4 col-md-3 p-3 col-lg-5-12">
                <div class="widget-box cursor-pointer">
                    <a href="/hosting/secretariacac.com/order/order-usage" class="widget-box__link" target="">
                        <div class="widget-box__content">

                            <span class="widget-box__subtitle text-center">
                                <span>Cadastrar</span>
                            </span>
                            <span class="widget-box__counter text-center">
                                <span>Casa de Paz</span>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col col-6 col-sm-4 col-md-3 p-3 col-lg-5-12">

            </div>
        </div>
    </div>
   
</div>