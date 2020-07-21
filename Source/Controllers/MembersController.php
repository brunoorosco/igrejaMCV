<?php

namespace Source\Controllers;

use Source\Models\CemModel;
use Source\Models\UserModel;
use Source\Models\MembersModel;
use Source\Models\CargoModel;
use Source\Models\IgrejaModel;



class MembersController extends Controller
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

    public function index($data): void
    {
        $cem =  $_SESSION['idCem'];
        $members = (new MembersModel())->find("supervisao = :c", "c={$cem}")->order("nome ASC")->fetch(true);
        echo $this->view->render("membro/listar", [
            "title" => "Minha CEM | " . SITE['name'],
            "members" => $members
        ]);
    }

    public function cadastroPage($data): void
    {
        $cargos = (new CargoModel())->find()->fetch(true);


        echo $this->view->render("membro/add", [
            "title" => "Minha CEM | " . SITE['name'],
            "status" => "Novo Membro",
            "button" => "Enviar",
            "link" => "add",
            "disable" => "enabled",
            "cargos" => $cargos,
        
        ]);
    }

    public function editarPage($data): void
    {
        $member = (new MembersModel())->findById("{$data["id"]}"); //TRAS INFORMAÇÃO DO MEMBRO
        
        $cem = (new CemModel())->findById($member->supervisao);// COM O ID DA CEM TRAZEMOS O NOME DA CEM
        
        $cargo = (new CargoModel())->findById($member->cargo);// COM O ID DO CARGO TRAZEMOS O NOME DO CARGO

        $igreja = (new IgrejaModel())->findById($member->igreja);// COM O ID DO CARGO TRAZEMOS O NOME DO CARGO
        
        // $cargos = (new CargoModel())->findById($member->cargo);
        //  var_dump($cargos);
        echo $this->view->render("membro/add", [
            "title" => "Membros | " . SITE['name'],
            "member" => $member,
            "status" => "Editar Membro",
            "button" => "Atualizar",
            "link" => "edit",
            "disable" => "disabled",
             "cargo" => $cargo,
             "cem" => $cem,
             "igreja" => $igreja,

        ]);
    }

    /*
        ************ FUNÇÃO CRUD *************************
        */

    //função para atualizar ou salvar novo usuário
    public function create($data): void
    {
        $member = (new MembersModel());
        $jobData = filter_var_array($data, FILTER_SANITIZE_STRING);


        if (empty($jobData['cargo'])) //evaluate false value only because ! 
        {
            echo $this->ajaxResponse("message", [
                "type" => "warging",
                "message" => "É necessario preencher campos!"
            ]);
            return;
        }


        $member->nome = $jobData["nome"];
        $member->email = $jobData["email"];
        // $member->nasc =  date("Y-m-d", strtotime(str_replace('/', '-', $jobData["nasc"])));
        $member->nasc =  $jobData["nasc"];
        $member->cargo = $jobData["cargo"];
        $member->supervisao = $jobData["supervisao"];
        $member->igreja = $jobData["igreja"];
        $member->telefone = $jobData["telefone"];
        $member->endereco = $jobData["endereco"];
        $member->numero = $jobData["numero"];
        $member->cep = $jobData["cep"];
        $member->city = $jobData["city"];
        $member->uf = $jobData["uf"];
        $member->bairro = $jobData["bairro"];


        if (!$member->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $member->fail()->getMessage()
            ]);
            return;
        }

        echo $this->ajaxResponse("message", [
            "type" => "success",
            "message" => "Registrado com Sucesso"
        ]);
        return;
    }

    public function update($data): void
    {

        $member = (new MembersModel())->findById("{$data['id']}");
        $jobData = filter_var_array($data, FILTER_SANITIZE_STRING);

        $member->nome = $jobData["nome"];
        $member->email = $jobData["email"];
        // $member->nasc =  date("Y-m-d", strtotime(str_replace('/', '-', $jobData["nasc"])));
        $member->nasc =  $jobData["nasc"];
        $member->cargo = $jobData["cargo"];
        $member->supervisao = $jobData["supervisao"];
        $member->igreja = $jobData["igreja"];
        $member->telefone = $jobData["telefone"];
        $member->endereco = $jobData["endereco"];
        $member->numero = $jobData["numero"];
        $member->cep = $jobData["cep"];
        $member->city = $jobData["city"];
        $member->uf = $jobData["uf"];
        $member->bairro = $jobData["bairro"];

        if (!$member->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $member->fail()->getMessage()
            ]);
            return;
        }

        echo $this->ajaxResponse("message", [
            "type" => "success",
            "message" => "Alterado com Sucesso"
        ]);
        return;
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
