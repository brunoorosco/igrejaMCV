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
        $cem = $_SESSION["cem"];

        $members = (new MembersModel())->find("supervisao = :name", "name={$cem}")->count();

        $n_encontro = (new EncontroModel())->find()->limit(1)->order("n_encontro DESC")->fetch(false);

        $encontristas =  (new EncontroModel())->find("n_encontro = :enc", "enc= {$n_encontro->n_encontro}")->fetch(true);
        $cnt = 0;
        foreach ($encontristas as $encontrista) {
            $info_encontrista = (new EncontristaModel())->findById($encontrista->encontrista);
            if ($info_encontrista->CEM === $cem) {
                $cnt++;
                //var_dump($cnt);
            }
        }

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
            "encontro" => $n_encontro->n_encontro,
             "encontrista" => $cnt
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
