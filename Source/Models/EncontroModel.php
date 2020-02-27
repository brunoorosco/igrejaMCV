<?php


namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class EncontroModel extends DataLayer
{
    public function __construct()
    {
        parent::__construct("encontro", ["n_encontro", "encontrista"], "id_encontro",true);
    }
   
   
}