<?php


namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Exception;

class linkEncontroModel extends DataLayer
{
    public function __construct()
    {
        parent::__construct("encontro", ["n_encontro", "encontrista"], "id_encontro",true);
    }
   
   
}