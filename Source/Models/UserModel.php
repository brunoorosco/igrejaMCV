<?php


namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Exception;

class UserModel extends DataLayer
{
    public function __construct()
    {
         parent::__construct("acessonew", ["password"], "id", true);
    }

    // public function save(): bool
    // {
    //     if (
    //         !$this->validarUsuario() ||
    //         !$this->validarSenha() ||
    //         !parent::save())
    //          { return false;
    //         }
    //     return true;
    // }

    // protected function validarUsuario(): bool
    // { 
    //     if(empty($this->Usuario)){
    //         $this->fail = new Exception("Informe um usuário válido");
    //         return false;
    //     }

    //     $userByUsuario = null;
    //     if(!$this->Codigo){
    //         $userByUsuario = $this->find("username =:usuario", "usuario={$this->Usuario}")->count();
    //     }else{
    //         $userByUsuario = $this->find("username =:usuario AND id != codigo", "usuario={$this->Usuario} & codigo={$this->Codigo}")->count();
    //     }
        
    //     if($userByUsuario){
    //         $this->fail = new Exception("O usuario informado já esta em uso");
    //     }
    // }

    // protected function validarSenha(): bool
    // {
    //     if (empty($this->Senha) || strlen($this->Senha) < 5) {
    //         $this->fail = new Exception("Informe uma senha com pelo menos 5 caracteres");
    //         return false;
    //     }

    //     if(password_get_info($this->Senha)["algo"]){
    //         return true;
    //     }

    //     $this->Senha = password_hash($this->Senha, PASSWORD_DEFAULT);
    //     return true;
    // }
}
