<?php $v->layout("theme/sidebar"); ?>
<!-- CADASTRO DE EMPRESAS -->

<?php $v->start("css"); ?>

<link rel="stylesheet" href="<?= asset('css/form.css'); ?>">
<link rel="stylesheet" href="<?= asset('css/load.css'); ?>">
<link rel="stylesheet" href="<?= asset('css/message.css'); ?>">
<link rel="stylesheet" href="<?= asset('css/pdv.css'); ?>">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />

<?php $v->end(); ?>

<div class="container-fluid">
    <nav class="navbar mt-2">
        <h4>Cadastro de Produto</h4>
    </nav>
    <div class="d-flex">
        <div class="pdv border rounded mr-3 p-2 h-100 col">
            <div class="form-group">
                <div class="input-group">
                    <?php $status = ((!isset($cem->igreja)) ? '0' : $cem->igreja); ?>
                    <select class="custom-select" name="igreja" id="selIgreja">
                        <option value='0' disabled <?php if ($status == "0") echo "selected"; ?>>Escolha um Opção</option>
                        <?php
                        foreach ($igrejas as $igreja) :
                        ?>
                            <option value="<?= $igreja->id ?>" <?php if ($status == $igreja->id) echo "selected"; ?>>
                                <?= $igreja->igreja ?>
                            </option>
                        <?php
                        endforeach; ?>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-primary" id="pesquisar" type="button">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="form-group">

                <input id="idProd" hidden />
                <input id="codProd" hidden />
                <input id="precoProd" hidden />

                <div class="input-group">
                    <input id="item" name='item' class="form-control user-input ui-autocomplete-input" placeholder="Nome, Codigo, Descrição" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" id="btnEnter" type="button">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="form-group table-itens">
                <table class="" id="pdv">
                    <thead class="table-desc">
                        <th class="col">Produto</th>
                        <th class="col-2">Preço</th>
                        <th class="col-1">Quant.</th>
                        <th class="col-1">SubTotal</th>
                        <th class="col-1 "><i class="fa fa-trash"></i></th>
                    </thead>
                    <tbody class="">

                    </tbody>

                </table>


            </div>
            <div class=" d-flex total-itens">
                <div class="d-flex col ">
                    <div class="col itens ">
                        <label>Total de Itens:</label>
                    </div>
                    <div class="col text-right mr-3">
                        <label id="totalItens">0</label>
                    </div>
                </div>
                <div class="d-flex col">
                    <div class="col">
                        <label>Total:</label>
                    </div>
                    <div class="col text-end mr-">
                        <label class="" id="total">R$ 0,00</label>
                    </div>
                </div>

            </div>
            <div class=" d-flex total-itens">
                <div class="d-flex col ">
                    <div class="col itens">
                        <label>Desconto(%):</label>
                    </div>
                    <div class="col text-right">
                        <input maxlength="3" id="desconto">
                    </div>
                </div>
                <div class="d-flex col ">
                    <div class="col text-left">
                        <label>Taxa:</label>
                    </div>
                    <div class="col text-right ">
                        <input maxlength="3" id="taxa">
                    </div>
                </div>

            </div>
            <div class=" d-flex total">
                <label class="ml-3">Total a Pagar</label>
                <label class="mr-4 pr-2" id="totalPagar">R$ 0,00</label>
            </div>

            <div class="d-flex botoes">
                <button type="button" id="btnLimpar" class="btn btn-block yellow">Limpar Itens</button>
                <button type="button" id="btnConsulta" class="btn btn-block roxo text-white">Consultar Preço</button>
                <button type="button" id="btnPag" class="btn btn-block btn-success">Pagamento</button>
            </div>

        </div>
        <div class="border rounded ml-3 p-2 col">
            teste 2
        </div>

    </div>

</div>


<?php $v->start("js"); ?>

<script src="<?= asset('js/maskara.js') ?>"></script>
<script src="<?= asset('js/validacao.js') ?>"></script>
<script src="<?= asset('js/cep.js') ?>"></script>
<script src="<?= asset('js/ajax.js') ?>"></script>

<script>
    $(document).ready(function() {
        $(".page-wrapper").removeClass("toggled");

        //ao ler o documetno
        $('#btnEnter').click(() => {
            let nome = $('#item').val();
            let preco = $('#precoProd').val();
            let idProd = $('#idProd').val();

            if (nome == "") {
                $('#item').focus()
                return
            }

            adicionaLinha(nome, preco);
            //autoComplete(idProd, preco, '<?= url("venda/item") ?>')
            novaLinha(idProd, nome)
            $('#item').val("");
            $('#precoProd').val("");
        })


        $("#item").autocomplete({
            source: function(request, response) {
                var itemIds = 0;

                $.ajax({
                    url: "<?= url("auto/item") ?>",
                    dataType: "json",
                    method: "POST",
                    data: {
                        item: request.term
                    },
                    success: function(data) {
                        response($.map(data.item, function(item) {
                            return {
                                label: item.nome,
                                value: item.nome,
                                preco: item.preco,
                                id: item.id

                            }

                        }))

                    }
                });
            },
            minLength: 1,
            select: function(event, ui) {

                if (ui.item) {

                    $('#idProd').val(ui.item.id)
                    $('#precoProd').val(ui.item.preco)

                }

            },

        });

        ////****** PROCESSO DE CALCULO DA TAXA NO VALOR TOTAL DOS ITENS */

        $('#btnPag').click(() => {
            $.ajax({
                    url: '<?= url("venda/item") ?>',
                    data: {
                        idsProdutos
                    },
                    method: "POST",
                    dataType: "json",
                    beforeSend: () => {
                        ajax_load("open")
                    }
                })
                .done(function(res) {
                    ajax_load("close");

                })
                .fail(function(err) {
                    console.log(err)
                })

        })

        function adicionaLinha(nome, preco) {

            var linha = "<tr>";
            linha += '<td class="col">' + nome + '</td>';
            linha += '<td class="col-2"> ' + preco + '</td>';
            linha += '<td class="col-1"><input maxlength="3" pattern="([0-9]{3})" class="quant" value="1"/></td>';
            linha += '<td class="col-1">' + (parseFloat(preco) * 1.00).toFixed(2).toLocaleString('pt-BR') + '</td>';
            linha += "<td class='col-1'><i class='removeLinha fa fa-close'></i></td>";
            linha += '</tr>';

            $("#pdv tbody").prepend(linha);
            calculaTotal($('#pdv')[0].rows)
        }

        $('#btnLimpar').click(() => {

            const tabela = $('#pdv');
            const linhas = tabela[0].rows;
            let i = 0;
            //let trs = document.querySelector("tr");
            // trs[trs.length - 1].remove(); 
            //     console.log(linhas.length - 1)
            i = linhas.length - 1;

            for (i; i >= 1; i--) {
                linhas[i].remove();
            }


        })

        //remove a linha
        $(document).on('click', '.removeLinha', function(e) {
            e.preventDefault();
            const tr = $(this).parent().parent()
            const linha = tr.index('tr'); //pega o num da linha; //pega valor digitado no input
            $('#pdv')[0].rows[linha].remove();
            calculaTotal($('#pdv')[0].rows)
        })

        ////****** PROCESSO DE CALCULO DA TAXA NO VALOR TOTAL DOS ITENS */
        $('#taxa').on('keyup', function(e) {
            e.preventDefault();
            const taxa = $(this).val(); //pega valor digitado no input
            let total = $('#total').html()
            if (!$.isNumeric(taxa)) {
                taxa = 0
            }
            totalRes = total.slice(8).replace(',', '.')
            const res = parseFloat(totalRes) * (parseFloat(taxa) / 100) + parseFloat(totalRes)

            $('#totalPagar').html(moedaReal(res.toFixed(2)))
            if (isNaN(res)) $('#totalPagar').html(moedaReal(linha)) //se resultado for diferente de qualquer valor coloca zero na tabela


        })

        ////****** PROCESSO DE CALCULO DA TAXA NO VALOR TOTAL DOS ITENS */
        $('#desconto').on('keyup', function(e) {
            e.preventDefault();
            let desconto = $(this).val(); //pega valor digitado no input
            let total = $('#total').html()

            if (!$.isNumeric(desconto)) {
                desconto = 0
            }
            totalRes = total.slice(8).replace(',', '.')

            const res = parseFloat(totalRes) - (parseFloat(totalRes) * (parseFloat(desconto) / 100.00))
            $('#totalPagar').html(moedaReal(res.toFixed(2)))


        })

        $(document).on('keyup', '.quant', function(e) {
            e.preventDefault();
            ////****** PROCESSO DE SUBTOTAL DO ITEM */
            const tabela = $('#pdv');
            const inp = $(this).val(); //pega valor digitado no input
            const celula = $(this).parent().index('td'); //pega a posição da celula
            const tr = $(this).parent().parent().index('tr'); //pega o num da linha

            $(this).val(this.value.match(/[0-9]*/)); //
            let str = "";
            //            console.log(inp.length)
            $(this).each(function(index) {
                str = str + $(this).val() //concatena valor de entrada
            })

            //usando jquery
            const column = $(this).parents("tr").find("td:nth-child(2)");
            const res = parseFloat(inp) * parseFloat(column.html()) //pega as variaveis dentro das suas target e multiplica     

            const subtotal = $(this).parents("tr").find("td:nth-child(4)")
            subtotal.text(res.toFixed(2).toLocaleString('pt-BR'))
            if (isNaN(res)) subtotal.text('0.00') //se resultado for diferente de qualquer valor coloca zero na tabela


            ////****** PROCESSO DE TOTAL DE ITEM */
            //  const tabela = $('#pdv');
            const linhas = tabela[0].rows;

            /// console.log($('#totalItens').text())

            ////****** PROCESSO DE PREÇO TOTAL DOS ITENS */
            calculaTotal(linhas)

            ////****** PROCESSO DE PREÇO TOTAL A PAGAR */



        })

        const calculaTotal = (linhas) => {
            $('#totalItens').html(linhas.length - 1);

            i = linhas.length - 1;
            let valorCalculado = 0
            for (i; i >= 1; i--) {
                let parcial = (linhas[i].cells[3].innerHTML)
                valorCalculado += parseFloat(parcial)
                console.log(parcial)
            }

            $("#total").text(moedaReal(valorCalculado.toFixed(2)));

            $("#totalPagar").text(moedaReal(valorCalculado.toFixed(2)));

        }


        const moedaReal = (moeda) => {
            var reais = new Intl.NumberFormat('pt-BR', {
                style: 'currency',
                currency: 'BRL',
            });
            return reais.format(moeda)
        }

        //   calculaTotal()


        idsProdutos = new Array();

        function novaLinha(idProd, nomeProd) {
            idsProdutos.push({
                "idProd": idProd,
                "nomeProd": nomeProd
            })
            console.log(idsProdutos)
        }

        // function enviarServer() {
        //     var parametro = linhas
        //         for (i = 0; i < linhas.length; i++) {
        //             parametro += [
        //                 parametro += linhas[i].idProd + 
        //                 parametro += linhas[i].nomeProd + 
        //                 parametro += linhas[i].idade +
        //                 parametro +=
        //             ],
        //         }
        //     //removendo última “,”
        //     parametro = parametro.substr(0, parametro.length - 1);
        //     alert(parametro); // esse valor você manda na querystring ou se estiver usando post pode adicionar ele em um campo hidden
        // }
    })
</script>

<?php $v->end(); ?>