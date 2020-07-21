<?php

namespace Source\Controllers;


use Source\Models\UserModel;
use Source\Models\ItemVendaModel;


class ItemVendasController extends Controller
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

    public function index($enc): void
    {
       
    }
    public function add($data): void
    {
       
    }

    public function edit($data)
    {
       
    }

    public function create($data, $func): bool
    {

        $nVenda = (new ItemVendaModel())->find("Nome = :name", "name={$data['nomeNorma']}")->fetch(false);
        if (! $nVenda) return false;


        if ($func === "update") {
            $ensaio = (new ItemVendaModel())->findById($data['id']);
        } else {
            $ensaio = new ItemVendaModel();
        }

        $jobData = filter_var_array($data, FILTER_SANITIZE_STRING);

        if (empty($jobData["ensaio"])) {
            $callback["message"] = message("informe o Nome da Ensaio");
            echo json_encode($callback);
            return false;
        }

        $ensaio->Nome = $jobData["ensaio"];
        $ensaio->CodEnsaio = $jobData["codEnsaio"];
      //  $ensaio->codNorma = $norma->Codigo;
        $ensaio->Carga = $jobData["qtHoras"];
        $ensaio->Preco = $jobData["preco"];
        $ensaio->Status = $jobData["status"];
        // $ensaio->Status = $jobData["status"];

        if ($ensaio->save()) return true;
        else return false;
    }

    public function update($data): void
    {
        /** não esquecer de inserir uma coluna com a cod de norma no ensaio */
        $ens = new itemVendaModel();
        $ensaio = $ens->findById("{$data["id"]}");

        if ($ensaio->codNorma) {
            $norma = (new ItemVendaModel())->findById($ensaio->codNorma);
        }

        //   $norma = $ens->ensaioNorma($ensaio);

        echo $this->view->render("../ensaio/edit", [
            "title" => "Ensaios  | " . SITE['name'],
            "ensaio" => $ensaio,
            "norma" => $norma

        ]);
    }

    public function delete($data)
    {
        if (empty($data["id"])) return;

        $id = filter_var($data["id"], FILTER_VALIDATE_INT);
        $ensaio = (new ItemVendaModel())->findById($id);
        var_dump($ensaio);
        if ($ensaio) {
            $ensaio->destroy();
        }
        $callback = true;
        echo json_encode($callback);
    }
}
