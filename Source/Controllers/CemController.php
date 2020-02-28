<?php

namespace Source\Controllers;

use Source\Models\CemModel;
use Source\Models\UserModel;
use Source\Models\MembersModel;



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
        $members = (new MembersModel())->find("supervisao = :c","c={$cem}")->order("nome ASC")->fetch(true);
        echo $this->view->render("cem/listar", [
            "title" => "Minha CEM | " . SITE['name'],
            "members" => $members
        ]);
    }

    public function incluir($data): void
    {
        echo $this->view->render("cem/add", [
            "title" => "Minha CEM | " . SITE['name']

        ]);
    }

    public function buscar($data)
    {
        $this->ajaxResponse("message", [
            "type" => "success",
            "message" => "Registro alterado com sucesso!"
        ]);
        
        echo $this->view->render("cem/teste", [
            "title" => "Minha CEM | " . SITE['name']

        ]);
        //  $empresa = Empresa::buscarEmpresa($data);

        // Decodifica o formato JSON e retorna um Objeto
        //  $json = json_decode($empresa);
        //   echo ($empresa);
        // Loop para percorrer o Objeto
        // die();
        //echo $empresa;
    }
    public function atualizar($data): void
    {
        $atualizar = $this->update_create($data, "update");
       // var_dump($atualizar);
        //if ($empresa->save()) {
        if ($atualizar) {
            $this->ajaxResponse("message", [
                "type" => "success",
                "message" => "Registro alterado com sucesso!"
            ]);
            return;

           // flash("success", "Atualizado com sucesso!");
        // $callback["message"] = "Equipamento cadastrada com sucesso!";
        // $callback["type"] = "success";
        // echo json_encode($callback);
        } else {
        //     $this->ajaxResponse("message", [
        //         "type" => "error",
        //         "message" => "Não foi possivel alterar!"
        //     ]);
        //    return;
        }
    }


    public function adicionar($data): void
    {
       
        $criar = $this->update_create($data, "create");
        if ($criar) {
            $this->ajaxResponse("message", [
                "type" => "success",
                "message" => "Membro cadastrado com sucesso!"
            ]);
           return;
        } else {
            $this->ajaxResponse("message", [
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
        $member->nasc =  date("Y-m-d",strtotime(str_replace('/','-',$jobData["nasc"])));
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
        $member = (new MembersModel())->findById($id);

        if ($member) {
            $member->destroy();
        }
        $callback = true;
        echo json_encode($callback);
    }
}
