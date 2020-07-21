<?php


namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class ProdutoModel extends DataLayer
{
    public function __construct()
    {
       
        parent::__construct("produtos", ["nome", "preco"], "id", true);
    }

    public function buscarProduto(){

       //SELECT * FROM produtos WHERE nome LIKE '%cam%'
    }

}