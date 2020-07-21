<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Exception;

class MembersModel extends DataLayer
{
    public function __construct()
    {
        parent::__construct("membros", ["nome", "cargo", "igreja",], "idmembros", true);
    }

    public function save(): bool
    {
        if (
             !$this->validarEmail() ||
             !parent::save()
        ) {
            return false;
        }
        return true;
    }

    protected function validarEmail(): bool
    {
        if (empty($this->email)) {
                return true;
        }
      

        $userByEmail = null;

        if (!$this->idmembros) {
            $userByEmail = $this->find("email = :email", "email={$this->email}")->count();
        } else {
            $userByEmail = $this->find("email = :email AND idmembros != :id", "email={$this->email} & id={$this->idmembros}")->count();
        }

        if ($userByEmail) {
            $this->fail = new Exception("O e-mail informado já esta em uso");    
            return false;
        }
        return true;
    }

    // public static function validarUsuario()
    // {
    //     if (($_SESSION['codUsuario'] != '')) {
    //         return $_SESSION['codUsuario'];
    //     } else {
    //         return false;
    //         //   autenticar(); 
    //         //header("location:app/login/login.php");
    //         $_SESSION['msg_login'] = "<div id='message' class='alert alert-warning' role='alert'><strong>É necessário estar logado ao sistema!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
    //         // header("Location:" .$URLBASE);
    //     }
    // }

}
