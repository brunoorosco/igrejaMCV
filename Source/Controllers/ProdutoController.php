<?php

namespace Source\Controllers;


use Source\Models\UserModel;
use Source\Models\ProdutoModel;



////PGINA DE USO DA SECETRARIA ENCONTRO E GERAL
class ProdutoController extends Controller
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
        $produtos =  (new ProdutoModel())->find()->order("nome ASC")->fetch(true);

        echo $this->view->render("painel/produtos", [
            "title" => "Produtos  | " . SITE['name'],
            "produtos" => $produtos,
        ]);
    }

    public function adicionar($data): void
    { {
            $produtos = (new ProdutoModel())->find()->fetch(true);
            echo $this->view->render("painel/cadastroProduto", [
                "title" => "Produto | " . SITE['name'],
                "status" => "Cadastro de Produto",
                "button" => "Salvar",
                "link" => "add",
                "disable" => "enabled",

            ]);
        }
    }

    public function editar($data): void
    {
        $produtos = (new ProdutoModel())->findById($data['id']);

        echo $this->view->render("painel/CadastroProduto", [
            "title" => "Produto | " . SITE['name'],
            "status" => "Alterar Produto",
            "button" => "Alterar",
            "link" => "edit",
            "disable" => "enabled",
            "produto" => $produtos,

        ]);
    }

    public function entrada($data): void
    {
        $produtos = (new ProdutoModel())->find()->fetch(true);
        echo $this->view->render("painel/movProduto", [
            "title" => "Entrada | " . SITE['name'],
            "status" => "Entrada de Produto",
            "button" => "Registrar Entrada",
            "link" => "add/entrada",
            "disable" => "enabled",
            "produtos" => $produtos,

        ]);
    }

    public function saida($data): void
    {
        $produtos = (new ProdutoModel())->find()->fetch(true);

        echo $this->view->render("painel/movProduto", [
            "title" => "Saída | " . SITE['name'],
            "status" => "Saída de Produto",
            "button" => "Registrar Saída",
            "link" => "add/saida",
            "disable" => "enabled",
            "produtos" => $produtos,

        ]);
    }

    ///////////------FUNÇÃO CRUD ---------------/////////////////  
    public function create($data): void
    {

        $produto =  (new ProdutoModel());

        $jobData = filter_var_array($data, FILTER_SANITIZE_STRING);

        $produto->codigo = $jobData["codigo"];
        $produto->nome = $jobData["nome"];
        $produto->preco = $jobData['preco'];
        $produto->estoque = $jobData['estoque'];
        $produto->estoquemin = $jobData['estoquemin'];

        if (!$produto->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $produto->fail()->getMessage()
            ]);
            return;
        }

        echo $this->ajaxResponse("message", [
            "type" => "success",
            "message" => "Produto registrado com sucesso!!!"
        ]);
        return;
    }


    public function update($data): void
    {
        $jobData = filter_var_array($data, FILTER_SANITIZE_STRING);

        $produto =  (new ProdutoModel())->findById($jobData['id']);

        $produto->codigo = $jobData["codigo"];
        $produto->nome = $jobData["nome"];
        $produto->preco = $jobData['preco'];
        $produto->estoque = $jobData['estoque'];
        $produto->estoquemin = $jobData['estoquemin'];

        if (!$produto->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $produto->fail()->getMessage()
            ]);
            return;
        }

        echo $this->ajaxResponse("message", [
            "type" => "success",
            "message" => "Produto alterado com sucesso!!!"
        ]);
        return;
    }

    public function delete($data)
    {

        if (empty($data["id"])) return;

        $id = filter_var($data["id"], FILTER_VALIDATE_INT);

        //$member = (new MembersModel())->find("idmembros = :id","id={$id}")->fetch(false);
        $member = (new ProdutoModel())->findById($id);

        $callback = false;

        if ($member) {
            $member->destroy();
            $callback = true;
        }

        echo json_encode($callback);
    }
}
