<?php


namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class PagamentoModel extends DataLayer
{
    public function __construct()
    {
       
        parent::__construct("pagamento", ["forma"], "id", true);
    }

    public function buscarProduto(){

       //SELECT * FROM produtos WHERE nome LIKE '%cam%'
    }

}