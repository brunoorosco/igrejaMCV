<?php


namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class VendasModel extends DataLayer
{
    public function __construct()
    {
       
        parent::__construct("vendas", ["valorTotal", "ValorCusto", "dataVenda","formaPagamento"], "id", true);
    }

    public function buscarProduto(){

       //SELECT * FROM produtos WHERE nome LIKE '%cam%'
    }

}