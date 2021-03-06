<?php

namespace Source\Controllers;

use Source\Models\EquipModel;
use Source\Models\UserModel;

class EquipController extends Controller
{
    public function __construct($router)
    {
        parent::__construct($router);
        if (empty($_SESSION["user"]) || !$this->user = (new UserModel())->findById($_SESSION["user"])) {
            unset($_SESSION["user"]);
           
            flash("error", "Acesso negado!");
            $this->router->redirect("web.login");
        }
    }

    public function todos($email): void
    {
        // echo $email;
        //$user = User::login($email,$senha);
        $equipamentos = (new EquipModel())->find()->fetch(true);
        // var_dump($comps);
        echo $this->view->render("equipamento/todos", [
            "title" => "Equipamentos | " . SITE['name'],
            "equips" => $equipamentos

        ]);
    }
    public function adicionar($data): void
    {
        $criar = $this->update_create($data, "create");

        //if ($empresa->save()) {
        if ($criar) {
            $callback["message"] = "Equipamento cadastrada com sucesso!";
            $callback["action"] = "success";
            echo json_encode($callback);
        } else {
            $callback["message"] = "Não foi possivel cadastrar!";
            $callback["action"] = "error";
            echo json_encode($callback);
        }
    }

    public function atualizar($data)
    {
        $atualizar = $this->update_create($data, "update");
        // var_dump($data);
        //if ($empresa->save()) {
        if ($atualizar) {
            $callback["message"] = "Equipamento atualizado com sucesso!";
            $callback["action"] = "success";
            echo json_encode($callback);
        } else {
            $callback["message"] = "Não foi possivel Atualizar!";
            $callback["action"] = "error";
            echo json_encode($callback);
        }
    }

    public function update_create($data, $func): bool
    {

        // $norma = (new NormaModel())->find("Nome = :name", "name={$data['nomeNorma']}")->fetch(false);
        // if(!$norma)return false;
        if ($func === "update") {
            $ensaio = (new EquipModel())->findById($data['Codigo']);
        } else {
            $ensaio = new EquipModel();
        }

        $norma = filter_var_array($data, FILTER_SANITIZE_STRING);

        $ensaio->Nome = $norma["norma"];
        $ensaio->Status = $norma["statusNorma"];
        $ensaio->ano = $norma["anoNorma"];

        if ($ensaio->save()) return true;
        else return false;
    }

    public function editar($data): void
    {
        $equipamentos = (new EquipModel())->findById("{$data["id"]}");
        echo $this->view->render("equipamento/editEquipamento", [
            "title" => "Equipamentos  | " . SITE['name'],
            "equipamento" => $equipamentos
        ]);
    }

    public function excluir($data): void
    {
        if (empty($data["id"])) return;

        $id = filter_var($data["id"], FILTER_VALIDATE_INT);
        $equip = (new EquipModel())->findById($id);
        var_dump($equip);
        if ($equip) {
            $equip->destroy();
        }
        $callback = true;
        echo json_encode($callback);
    }
}
