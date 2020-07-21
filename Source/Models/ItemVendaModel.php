<?php


namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class ItemVendaModel extends DataLayer
{
    public function __construct()
    {
       
        parent::__construct("itensvendas", ["idVenda", "idProduto"], "id", true);
    }

    
}