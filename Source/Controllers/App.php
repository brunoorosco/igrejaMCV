<?php

namespace Source\Controllers;

use Source\Models\MembersModel;
use Source\Models\UserModel;
use Source\Models\EncontroModel;
use Source\Models\EncontristaModel;

class App extends Controller
{
    /** @var FuncionarioModal   */
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

    public function home(): void
    {
        $cem = $_SESSION["idCem"];

        $members = (new MembersModel())->find("supervisao = :n", "n={$cem}")->count();

        $encontro = (new EncontroModel())->find("tipo = :e", "e=encontro")->limit(1)->order("n_encontro DESC")->fetch(false);

        $reencontro = (new EncontroModel())->find("tipo = :e", "e=reencontro")->limit(1)->order("n_encontro DESC")->fetch(false);


        $encontristas =  (new EncontristaModel())->find("idEncontro = :enc AND idcem = :cem", "enc= {$encontro->id} & cem={$cem}")->count();

        $reencontristas =  (new EncontristaModel())->find("idEncontro = :enc AND idcem = :cem", "enc= {$reencontro->id} & cem={$cem}")->count();




        //$encontrista = (new EncontristaModel())->find("CEM = :name AND n_encontro", "name={$cem}")->count();
        //var_dump( $n_encontrista);

        $head = $this->seo->optimize(
            "Bem vind@ {$this->user->Nome} | " . site("name"), //title
            site("desc"), //descrição
            $this->router->route("app.home"), //url
            routeImage("Home") //image
        )->render(); //transforma tudo em string

        echo $this->view->render("theme/dashboard", [
            "head" => $head,
            "user" => $this->user,
            "title" => "Dashboard | " . SITE['name'],
            "members" => $members,
            "encontro" => $encontro->n_encontro,
            "reencontro" => $reencontro->n_encontro,
            "encontrista" => $encontristas,
            "reencontrista" => $reencontristas
        ]);
    }

    public function painel()
    {
        echo $this->view->render("painel/painel", [

            "title" => "Dashboard | " . SITE['name'],

        ]);
    }

    public function logoff()
    {
        unset($_SESSION['user']);

        flash("info", "Você saiu com sucesso, volte logo {$this->user->Nome}");

        $this->router->redirect("web.login");
    }


    public function informaGeral()
    {
    }
}
