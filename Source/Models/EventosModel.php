<?php


namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class EventosModel extends DataLayer
{
    public function __construct()
    {
       //aniversário, cem, sexo
        parent::__construct("eventos", ["titulo", "color","inicioevento", "terminoevento"], "id", false);
    }
  
   
}