<?php

namespace Source\Controllers;

use JsonSerializable;
use Source\Models\UserModel;
use Source\Models\EncontroModel;
use Source\Models\EncontristaModel;
use Source\Models\MembersModel;
use Source\Models\ProdutoModel;

////PGINA DE USO DA SECETRARIA ENCONTRO E GERAL
class autoController extends Controller
{
    public function __construct($router)
    {
        parent::__construct($router);
        // if (empty($_SESSION["user"]) || !$this->user = (new UserModel())->findById($_SESSION["user"])) {
        //     unset($_SESSION["user"]);

        //     flash("error", "Acesso negado!");
        //     $this->router->redirect("web.login");
        // }
    }

    public function item($data)
    {       

        $pesquisa = $data["item"];
        $produtos =  (new ProdutoModel())->complete($pesquisa, 'nome')->order("nome ASC")->fetch(true);
        
        for ($i = 0; $i < count($produtos); $i++) {

            $itens[] =  array(
                'id' => $produtos[$i]->id,
                'nome' => $produtos[$i]->nome,
                'preco' => $produtos[$i]->preco,
                'custo' => $produtos[$i]->custo,
            );
        }

        echo $this->ajaxResponse(
            "item",
            $itens
        );

        return ;
    }

    public function cadastroPage($data): void
    { {
            $encontros = (new EncontroModel())->find()->fetch(true);
            echo $this->view->render("encontro/cadastropage", [
                "title" => "Encontro | " . SITE['name'],
                "status" => "Cadastro Encontro",
                "button" => "Cadastrar",
                "link" => "add",
                "disable" => "enabled",

            ]);
        }
    }

    public function editPage($data): void
    {
        $encontros = (new EncontroModel())->findById($data['id']);

        echo $this->view->render("encontro/cadastropage", [
            "title" => "Encontro | " . SITE['name'],
            "status" => "Alterar Encontro",
            "button" => "Alterar",
            "link" => "edit",
            "disable" => "enabled",
            "encontro" => $encontros,

        ]);
    }

    ///////////------FUNÇÃO CRUD ---------------/////////////////  
    public function create($data): void
    {

        $encontro =  (new EncontroModel());

        $jobData = filter_var_array($data, FILTER_SANITIZE_STRING);

        $encontro->tipo = $jobData["tipo"];
        $encontro->n_encontro = $jobData["n_encontro"];
        $encontro->responsavel = $jobData['responsavel'];
        $encontro->data_inicial = $jobData['data_inicial'];

        if (!$encontro->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $encontro->fail()->getMessage()
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
        $jobData = filter_var_array($data, FILTER_SANITIZE_STRING);

        $encontro =  (new EncontroModel())->findById($jobData['id']);

        $encontro->tipo = $jobData["tipo"];
        $encontro->n_encontro = $jobData["n_encontro"];
        $encontro->responsavel = $jobData['responsavel'];
        $encontro->data_inicial = $jobData['data_inicial'];

        if (!$encontro->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $encontro->fail()->getMessage()
            ]);
            return;
        }

        echo $this->ajaxResponse("message", [
            "type" => "success",
            "message" => "Alterado com Sucesso"
        ]);
        return;
    }

    public function delete($data)
    {

        if (empty($data["id"])) return;

        $id = filter_var($data["id"], FILTER_VALIDATE_INT);

        //$member = (new MembersModel())->find("idmembros = :id","id={$id}")->fetch(false);
        $member = (new EncontroModel())->findById($id);

        $callback = false;

        if ($member) {
            $member->destroy();
            $callback = true;
        }

        echo json_encode($callback);
    }
}
