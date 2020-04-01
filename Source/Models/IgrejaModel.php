<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class IgrejaModel extends DataLayer
{
    public function __construct()
    {
        //parent::__construct("tbl_empresas", ["CodigoCliente", "Nome","Endereco","Numero","CNPJ","Contato", 
        // "Email", "Telefone", "Ie","CEP","Fax","Ramal","Bairro","Cidade","Estado","Sgset","Status","CPF","Telefone2","Celular"], "Codigo");
        parent::__construct("igrejas", ["igreja", "endereco", "numero", "telefone", "idpastor"], "id",true);
    }
   
   
}
