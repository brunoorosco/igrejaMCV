<?php


namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class BatModel extends DataLayer
{
    public function __construct()
    {
       //aniversário, cem, sexo
        parent::__construct("batizando", ["nome", "batismo"], "id", false);
    }
  
   
}