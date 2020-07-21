<?php

namespace Source\Controllers;

use Source\Models\CemModel;
use Source\Models\UserModel;
use Source\Models\MembersModel;
use Source\Models\IgrejaModel;



class CemController extends Controller
{
    /** @var UserModal   */
    protected $user;

    public function __construct($router)
    {
        parent::__construct($router);
        if (empty($_SESSION["user"]) || !$this->user = (new UserModel())->findById($_SESSION["user"])) {
            unset($_SESSION["user"]);

            flash("error", "Acesso negado!");
            $this->router->redirect("web.login");
        }
    }

    public function cem($data): void
    {
        $cem =  $_SESSION['cem'];
        $members = (new MembersModel())->find("supervisao = :c", "c={$cem}")->order("nome ASC")->fetch(true);
        echo $this->view->render("cem/listar", [
            "title" => "Minha CEM | " . SITE['name'],
            "members" => $members
        ]);
    }

    public function incluir($data): void
    {
        $igrejas = (new IgrejaModel())->find()->order("igreja ASC")->fetch(true);

        echo $this->view->render("cem/cadastroCem", [
            "title" => "Minha CEM | " . SITE['name'],
            "igrejas" => $igrejas,
            "status" => "Nova CEM's",
            "button" => "Cadastrar",
            "link" => "add",
            "disable" => "enabled",
        ]);
    }


    public function pageTransfer($data): void
    {
        $membro = (new MembersModel())->findById($data['id']);
        $igrejas = (new IgrejaModel())->find()->order("igreja ASC")->fetch(true);
        $cem = (new CemModel())->find()->order("nome_cem ASC")->fetch(true);

        echo $this->view->render("cem/transferMembro", [
            "title" => "Minha CEM | " . SITE['name'],
            "membro" => $membro,
            "igrejas" => $igrejas,
            "cems" => $cem,


        ]);
    }




    public function atualizar($data): void
    {
        $atualizar = $this->update_create($data, "update");

        if ($atualizar) {
            echo $this->ajaxResponse("message", [
                "type" => "success",
                "message" => "Registro alterado com sucesso!"
            ]);
            return;
        } else {
            echo  $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Não foi possivel alterar!"
            ]);
            return;
        }
    }

    public function adicionar($data): void
    {
        $criar = $this->update_create($data, "create");
        if ($criar) {
            echo $this->ajaxResponse("message", [
                "type" => "success",
                "message" => "Membro cadastrado com sucesso!"
            ]);
            return;
        } else {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Não foi possivel cadastrar!"
            ]);
            return;
        }
    }

    public function update_create($data, $func): bool
    {
        $member = (new MembersModel())->findById($data['idmembros']);

        $jobData = filter_var_array($data, FILTER_SANITIZE_STRING);

        $member->nome = $jobData["nome"];
        $member->email = $jobData["email"];
        $member->nasc =  date("Y-m-d", strtotime(str_replace('/', '-', $jobData["nasc"])));
        $member->cargo = $jobData["cargo"];
        $member->supervisao = $jobData["supervisao"];
        $member->igreja = $jobData["igreja"];
        $member->telefone = $jobData["telefone"];
        $member->endereco = $jobData["endereco"];
        $member->numero = $jobData["numero"];
        //var_dump($member);
        if ($member->save()) return true;
        else return false;
    }

    public function editar($data): void
    {
        $member = (new MembersModel())->findById("{$data["id"]}");
        echo $this->view->render("cem/edit", [
            "title" => "Membros | " . SITE['name'],
            "member" => $member

        ]);
    }
    public function excluir($data)
    {

        if (empty($data["id"])) return;

        $id = filter_var($data["id"], FILTER_VALIDATE_INT);

        //$member = (new MembersModel())->find("idmembros = :id","id={$id}")->fetch(false);
        $member = (new MembersModel())->findById($id);

        $callback = false;

        if ($member) {
            $member->destroy();
            $callback = true;
        }

        echo json_encode($callback);
    }
}
