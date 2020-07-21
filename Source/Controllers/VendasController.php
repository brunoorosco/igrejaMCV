<?php

namespace Source\Controllers;


use Source\Models\UserModel;
use Source\Models\EncontroModel;
use Source\Models\EncontristaModel;
use Source\Models\ItemVendaModel;

class VendasController extends Controller
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

        $encontristas =  (new EncontroModel())->find("n_encontro = :enc", "enc= {$enc['id']}")->fetch(true);
        
       // $encontrista = (new EncontristaModel())->find("CEM = :c ","c= {$cem}")->fetch(true);

        //var_dump($encontrista);
     
        foreach ($encontristas as $encontrista) {
             $info_encontrista = (new EncontristaModel())->findById($encontrista->encontrista);
            if ($info_encontrista->CEM === $cem) {
                 $members[] = $info_encontrista->data();
        //   var_dump(  $info_encontrista);
            }
            
        }

        echo $this->view->render("encontro/encontro", [
            "title" => "Encontro  | " . SITE['name'],
            "encontristas" => $members,
        ]);
    }
    public function add($data): void
    {
            
    }

    public function edit($data)
    {
       
     }

    public function create($data): bool
    {
        $itens = (new ItemVendaModel());

       $dados = $data['idsProdutos'];
       //print_r($dados[0]['idProd']);
       foreach ($dados as $dado) {
           $itens->idProduto = $dado['idProd'];
           $itens->idVenda = "123456";
           if ($itens->save()) return true;
                else{
                    return false;
                }

                //print_r($dado['idProd']);
       }

        // $norma = (new EncontristaModel())->find("Nome = :name", "name={$data['nomeNorma']}")->fetch(false);
        // if (!$norma) return false;


        // if ($func === "update") {
        //     $ensaio = (new EncontroModel())->findById($data['id']);
        // } else {
        //     $ensaio = new EncontroModel();
        // }

        // $jobData = filter_var_array($data, FILTER_SANITIZE_STRING);

        // if (empty($jobData["ensaio"])) {
        //     $callback["message"] = message("informe o Nome da Ensaio");
        //     echo json_encode($callback);
        //     return false;
        // }

        // $ensaio->Nome = $jobData["ensaio"];
        // $ensaio->CodEnsaio = $jobData["codEnsaio"];
        // $ensaio->codNorma = $norma->Codigo;
        // $ensaio->Carga = $jobData["qtHoras"];
        // $ensaio->Preco = $jobData["preco"];
        // $ensaio->Status = $jobData["status"];
        // // $ensaio->Status = $jobData["status"];

        // if ($ensaio->save()) return true;
        // else return false;
    }

    public function update($data): void
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

    public function delete($data)
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
