<?php


namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Exception;


class EncontristaModel extends DataLayer
{
    public function __construct()
    {
        parent::__construct("encontrista", ["nomeEnc"], "idEncontrista", true);
    }
}
