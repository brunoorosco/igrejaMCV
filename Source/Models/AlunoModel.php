<?php


namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class AlunoModel extends DataLayer
{
    public function __construct()
    {
        parent::__construct("alunos", ["idcurso", "", ""], "id",true); //nome e idmembro pode ser nulo
    }

 
}
