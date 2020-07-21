<?php

namespace Source\Controllers;


use Source\Models\UserModel;
use Source\Models\EncontroModel;
use Source\Models\EncontristaModel;


class EncontristaController extends Controller
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
        $cem = $_SESSION["nomeCem"];
               
        //$n_encontro = (new EncontroModel())->find()->limit(1)->order("n_encontro DESC")->fetch(false);
        
        $encontro =  (new EncontroModel())->find("n_encontro = :enc", "enc= {$enc['encontro']}")->fetch(false); //busca informações do encontro ou reencontro
           
        $encontristas =  (new EncontristaModel())->find("idEncontro = :idencontro", "idencontro= {$encontro->id} ")->order("nomeEnc ASC")->fetch(true); //carrega encontrista do encontro selecionado
        
        //$encontrista = (new EncontristaModel())->find("CEM = :c ","c= {$cem}")->fetch(true);
     
        foreach ($encontristas as $encontrista) {

            $info_encontrista = (new EncontristaModel())->findById($encontrista->idEncontrista);
            
            if ($info_encontrista->CEM === $cem) {
                 $members[] = $info_encontrista->data();
               // var_dump(  $members);
            }
            
        }

        echo $this->view->render("encontrista/encontrista", [
            "title" => "Encontrista  | " . SITE['name'],
            "encontristas" => $members,
            "encontro" => $encontro->tipo. " - ". $encontro->n_encontro
        ]);
    }
    public function adicionar($data): void
    {
        $criar = $this->update_create($data, "create");
        //if ($empresa->save()) {
        if ($criar) {
            $callback["message"] = "Ensaio cadastrada com sucesso!";
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
        //if ($empresa->save()) {
        if ($atualizar) {
            $callback["message"] = "Ensaio atualizado com sucesso!";
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

        $norma = (new EncontristaModel())->find("Nome = :name", "name={$data['nomeNorma']}")->fetch(false);
        if (!$norma) return false;


        if ($func === "update") {
            $ensaio = (new EncontroModel())->findById($data['id']);
        } else {
            $ensaio = new EncontroModel();
        }

        $jobData = filter_var_array($data, FILTER_SANITIZE_STRING);

        if (empty($jobData["ensaio"])) {
            $callback["message"] = message("informe o Nome da Ensaio");
            echo json_encode($callback);
            return false;
        }

        $ensaio->Nome = $jobData["ensaio"];
        $ensaio->CodEnsaio = $jobData["codEnsaio"];
        $ensaio->codNorma = $norma->Codigo;
        $ensaio->Carga = $jobData["qtHoras"];
        $ensaio->Preco = $jobData["preco"];
        $ensaio->Status = $jobData["status"];
        // $ensaio->Status = $jobData["status"];

        if ($ensaio->save()) return true;
        else return false;
    }

    public function editar($data): void
    {
        /** não esquecer de inserir uma coluna com a cod de norma no ensaio */
        $ens = new EncontroModel();
        $ensaio = $ens->findById("{$data["id"]}");

        if ($ensaio->codNorma) {
            $norma = (new EncontristaModel())->findById($ensaio->codNorma);
        }

        //   $norma = $ens->ensaioNorma($ensaio);

        echo $this->view->render("../ensaio/edit", [
            "title" => "Ensaios  | " . SITE['name'],
            "ensaio" => $ensaio,
            "norma" => $norma

        ]);
    }

    public function excluir($data)
    {
        if (empty($data["id"])) return;

        $id = filter_var($data["id"], FILTER_VALIDATE_INT);
        $ensaio = (new EncontroModel())->findById($id);
        var_dump($ensaio);
        if ($ensaio) {
            $ensaio->destroy();
        }
        $callback = true;
        echo json_encode($callback);
    }
}
