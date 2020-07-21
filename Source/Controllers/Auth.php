<?php

namespace Source\Controllers;

use Source\Models\IgrejaModel;
use Source\Models\UserModel;
use Source\Models\MembersModel;
use Source\Models\CemModel;
use Source\Support\Email;

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

        $member = (new MembersModel())->find("email = :e", "e={$email}")->fetch(false);

        ///// VERIFICA SE TEM ALGUM EMAIL E SENHA
        if (!$email || !$passwd || !$member) {
            echo $this->ajaxResponse("message", [
                "type" => "atencion",
                "message" => "Informe seu e-mail e senha para logar"
            ]);
            return;
        }

        $user = (new UserModel())->find("userID = :id", "id={$member->idmembros}")->fetch(false);

        $passwd = sha1($passwd);
        //if (!$user || !password_verify($passwd, $user->passwd)) {
        if (!$user ||  $passwd != $user->password) {
            echo $this->ajaxResponse("message", [
                "type" => "atencion",
                "message" => "E-mail ou senha não conferem!"
                // "message" => $user->password
            ]);
            return;
        }

        $_SESSION["user"] = $user->id;
        $_SESSION["userJob"] = $user->nivel_acesso;
        $_SESSION["userName"] = $member->email;
        $_SESSION["idCem"] = $member->supervisao;

        $_SESSION["nomeCem"] = $member->supervisao;
        $_SESSION['idIgreja'] = $member->igreja;

        ////CARRREGA AS INFORMAÇÕES DA IGREJA NA VARIAVEL
        $igreja = (new IgrejaModel())->findById($member->igreja);
        $_SESSION["igreja"] = $igreja->igreja;

        ////CARRREGA AS INFORMAÇÕES DA CEM NA VARIAVEL
        $cem = (new CemModel())->findById($member->supervisao);
        $_SESSION["nomeCem"] = $cem->nome_cem;

        echo $this->ajaxResponse("redirect", ["url" => $this->router->route("app.home")]);
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

    public function forget($data): void
    {
        $email = filter_var($data["email"], FILTER_VALIDATE_EMAIL);

        $member = (new MembersModel())->find("email = :e", "e={$email}")->fetch(false);

        ///// VERIFICA SE TEM ALGUM EMAIL
        if (!$member || !$email) {
            echo $this->ajaxResponse("message", [
                "type" => "atencion",
                "message" => "Informe o SEU EMAIL de cadastro"
            ]);
            return;
        }

        //VERIFICA SE ESTE EMAIL POSSUI CADASTRADO NO ACESSO
        $user = (new UserModel())->find("userID = :id", "id={$member->idmembros}")->fetch(false);

        if (!$user) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Email não cadastrado"
            ]);
            return;
        }

        $user->forget = (sha1(uniqid(rand(), true)));
        $user->save();

        $_SESSION["forget"] = $user->id;

        $email = new Email();

        $email->add(
            "Recupere sua senha | " . SITE["name"],
            $this->view->render("emails/recover", [
                "user" => $member,
                "link" => $this->router->route("web.reset", [
                    "email" => $member->email,
                    "forget" => $user->forget
                ])
            ]),
            $member->nome,
            $member->email
        )->send();

        flash("success", "Enviamos um link para seu email");

        echo $this->ajaxResponse("redirect", [
            "url" => $this->router->route("web.forget")
        ]);
    }
}
