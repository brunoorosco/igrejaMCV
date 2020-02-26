<?php


namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class EncontristaModel extends DataLayer
{
    public function __construct()
    {
        parent::__construct(
            "encontrista",
            [
                "nomeEnc", //nome do Ensaio 
            ],
            "idEncontrista",
            true
        );
    }
}
