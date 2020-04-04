<?php

namespace Source\Controllers;

use Source\Models\CemModel;
use Source\Models\UserModel;
use Source\Models\MembersModel;
use Source\Models\CargoModel;



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
        $cem =  $_SESSION['cem'];
        $members = (new MembersModel())->find("supervisao = :c", "c={$cem}")->order("nome ASC")->fetch(true);
        
        echo $this->view->render("cem/listar", [
            "title" => "Minha CEM | " . SITE['name'],
            "members" => $members
            ]);
        }

        public function create($data): void
        {
            $cargos = (new CargoModel())->find()->fetch(true);
            echo $this->view->render("cem/add", [
                "title" => "Minha CEM | " . SITE['name'],
            "status" => "Novo Membro",
            "button" => "Enviar",
            "link" => "add",
            "disable"=> "enabled",
            "cargos" => $cargos

            ]);
        }
        
        public function editar($data): void
        {
            $member = (new MembersModel())->findById("{$data["id"]}");
            echo $this->view->render("cem/add", [
                "title" => "Membros | " . SITE['name'],
                "member" => $member,
                "status" => "Editar Memnbro",
                "button" => "Atualizar",
                "link" => "edit",
                "disable"=> "disabled"
    
    
            ]);
        }
        
        public function update($data): void
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

    public function salve($data): void
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

    //função para atualizar ou salvar novo usuário
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
        $member->cep = $jobData["cep"];
        $member->city = $jobData["city"];
        $member->uf = $jobData["uf"];
        $member->bairro = $jobData["bairro"];
        //var_dump($member);
        if ($member->save()) return true;
        else return false;
    }

    public function excluir($data)
    {
        
        if (empty($data["id"])) return;

        $id = filter_var($data["id"], FILTER_VALIDATE_INT);
       
        //$member = (new MembersModel())->find("idmembros = :id","id={$id}")->fetch(false);
        $member = (new MembersModel())->findById($id);
       
        $callback = false;
        
        if ( $member ) {
            $member->destroy();
            $callback = true;
        }
      
        echo json_encode($callback);
    }
}
