<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Exception;

class CargoModel extends DataLayer
{
    public function __construct()
    {
         parent::__construct("cargo", ["cargo"],"id",false);
    }

}
