<?php $v->layout("theme/sidebar"); ?>

<?php $v->start("css"); ?>

<link rel="stylesheet" href="<?= asset('css/datatables.css'); ?>">

<?php $v->end(); ?>

<?php $v->start("php") ?>

<?php $v->end(); ?>

<div class="container">

    <div class="ajax_load"></div>
    <div class="">
        <nav class="row navbar mb-2 justify-content-between">

            <a class="navbar-brand">
                <h5>Produtos</h5>
            </a>
            <a class="btn btn-sm btn-primary my-2 my-sm-0" href="<?= url("produtos/add"); ?>"> <i class="fa fa-plus"></i> Novo Produto</a>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <div class="ibox float-e-margins">

                <div class="ibox-content">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Preço - Venda</th>
                                <th>Estoque</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($produtos as $produto) :

                            ?>

                                <tr>
                                    <td class="text-left" width="75vw" scope="row"><?= $produto->id ?></td>
                                    <td class="text-left" width="90vw" scope="row"><?= $produto->codigo ?></td>
                                    <td class="text-left " scope="row"><?= $produto->nome ?></td>
                                    <td class="text-left money" width="150vw" scope="row"><?= "R$ " . str_replace('.', ',', $produto->preco) ?></td>
                                    <td class="text-left" width="150vw" scope="row"><?= $produto->estoque ?></td>

                                    <td class="text-left" width="150vw">
                                        <a role="button" data-toggle="modal" data-target="#alterarPriceModal" data-id=<?= $produto->id ?> data-nome=<?= $produto->nome ?> data-price=<?= $produto->price ?>>
                                            <i class="fa fa-usd text-navy"></i>
                                        </a>

                                        <a data-action="<?= url("produtos/edit") ?>" data-id=<?= $produto->id ?> data-func="edit">
                                            <i class="fa fa-pencil text-navy ml-2"></i>
                                        </a>
                                        <a data-action="<?= url("produtos/excluir") ?>" data-id=<?= $produto->id ?> data-nome=<?= $produto->nome ?> data-func="exc">
                                            <i class="fa fa-trash text-navy ml-2"></i>
                                        </a>

                                    </td>
                                </tr>

                            <?php
                            endforeach; ?>

                        </tbody>
                    </table>

                    <!-- Modal -->
                    <div class="modal fade" id="alterarPriceModal" >
                        <div class="modal-dialog" >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" class="form-control" id="price">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-primary ">Alterar</button>
                                </div>
                            </div>
                        </div>
                    </div>

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

<script type="text/javascript">
    $(document).ready(function() {

        $('#alterarPriceModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var nome = button.data('nome') // Extract info from data-* attributes
            var price = button.data('price') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

            var modal = $(this)
            modal.find('.modal-title').text('Alterar preço do produto: ' + nome)
            modal.find('#price').val(price)
        })
    })
</script>
<?php $v->end(); ?>