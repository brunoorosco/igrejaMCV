<?php

namespace Source\Controllers;

use Source\Models\UserModel;
use Source\Models\MembersModel;

class Auth extends Controller
{
    public function __construct($router)
    {
        parent::__construct($router);
    }
    public function login($data): void
    {
        $email = filter_var($data["user"], FILTER_DEFAULT);
        $passwd = filter_var($data["passwd"], FILTER_DEFAULT);
     
        if (!$email || !$passwd) {
            echo $this->ajaxResponse("message", [
                "type" => "alert",
                "message" => "Informe seu e-mail e senha para logar"
            ]);
            return;
        }

        $user = (new UserModel())->find("username = :e", "e={$email}")->fetch(false);
        $passwd = sha1($passwd);
         //if (!$user || !password_verify($passwd, $user->passwd)) {
        if (!$user ||  $passwd != $user->password) {
            echo $this->ajaxResponse("message", [
                "type" => "alert",
                "message" => "E-mail ou senha não conferem!"
               // "message" => $user->password
            ]);
            return;
        }

        $_SESSION["user"] = $user->id;
        $_SESSION["userName"] = $user->username;
        $_SESSION["userJob"] = $user->nivel_acesso;
        $member = (new MembersModel())->find("email = :e", "e={$email}")->fetch(false);
        $_SESSION["cem"] = $member->supervisao;
        echo $this->ajaxResponse("redirect",["url" => $this->router->route("app.home")]);
    }

    public function register($data)
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
        if (in_array("", $data)) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha todos os campos para cadastrar-se"
            ]);
            return;
        }

        $user = new UserModel();
        //$user->Nome = $data["first_name"];
        $user->Email = $data["username"];
        $user->Senha = password_hash($data["password"], PASSWORD_DEFAULT);

        if (!$user->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $user->fail()->getMessage()
            ]);
            return;
        }

        $_SESSION["user"] = $user->id;
        echo $this->ajaxResponse("redirect", [
            "url" => $this->router->route("app.home")
        ]);
    }
}
