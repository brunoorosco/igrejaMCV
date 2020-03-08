<?php


namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class HistoricoModel extends DataLayer
{
    public function __construct()
    {
        parent::__construct("historico", ["nome", "curso"], "idHist",false); //membroCad
    }

   
}
