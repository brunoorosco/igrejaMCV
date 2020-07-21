<?php $v->layout("theme/sidebar"); ?>

<?php $v->start("css"); ?>

<link rel="stylesheet" href="<?= asset('css/igreja.css'); ?>">

<?php $v->end(); ?>


<div class="container-fluid">
    <div class="ajax_load"></div>
    <div class="col-lg-12">
        <nav class="navbar navbar-light bg-light mb-2">
            <a class="navbar-brand">
                <h5>Igrejas</h5>
            </a>
            <a class="btn btn-primary my-2 my-sm-0" href="<?= url("igreja/add"); ?>"> <i class="fa fa-plus"></i> Nova Igreja</a>s
        </nav>
        <div class="row">

            <div class="ibox float-e-margins">

                <div class="igreja-content justi-center">
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
                                <a class="edit" type="button">
                                    <i class="fa fa-edit text-navy"></i>
                                </a>
                                <a class="delete" type="button" data-action="<?= url("igrejas/excluir") ?>" data-id=<?= $igreja->id ?> data-nome=<?= $igreja->igreja ?> data-func="exc">
                                    <i class="fa fa-trash text-navy"></i>
                                </a>
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

<script>
    $(document).ready(function() {


        function load(action) {
            var load_div = $(".ajax_load");
            if (action === "open") {
                load_div.fadeIn().css("display", "flex");

            } else {
                load_div.fadeOut();
            }
        }

        $("body").on("click", "[data-action]", function(e) {

            e.preventDefault();
            var data = $(this).data();
            var div = $(this).parent();
            console.log(div)
            var tr = $(this).closest('tr');
            var id = $(this).data('id');
            var func = $(this).data('func');
            if (func === "exc") {
                swal({
                        title: "Deseja realmente excluir cadastro da Igreja?",
                        text: data.nome,
                        icon: "warning",
                        buttons: {
                            cancel: {
                                text: "Cancel",
                                value: null,
                                visible: true,
                                className: "",
                                closeModal: true,
                            },
                            confirm: {
                                text: "OK",
                                value: true,
                                visible: true,
                                className: "",
                                closeModal: true,

                            },
                        },
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: data.action,
                                data: data,
                                type: 'DELETE',

                            }).done(function(resp) {
                                console.log(resp)
                                div.fadeOut('slow', function() {});

                            }).fail(function(resp) {

                            })



                        }
                    })
            } else {
                // console.log(data.action+'/'+data.id)
                window.location.href = data.action + '/' + data.id; //carrega pagina de edição
            }
        })


    })
</script>

<?php $v->end(); ?>