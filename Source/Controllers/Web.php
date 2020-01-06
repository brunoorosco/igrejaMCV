<?php

namespace Source\Controllers;

use Source\Models\User;
use Source\Models\FuncionarioModel;
//use helper\Seguranca;

define("ROTA", "../Source/Views/");

class Web extends Controller
{
  //  private $view;

    public function __construct($router)
    {
        //  new Seguranca();
        //$this->view = Engine::create(__DIR__ . "/../Views/theme", "php");
        parent::__construct($router);

        // if (!empty($_SESSION["usuario"])) {
        //     $this->router->redirect("web.home");
        // }
    }

    public function home($email): void
    {
        $autenticado = User::validarUsuario();

        if ($autenticado != 0) {
            echo $this->view->render("home", [
                "title" => "Home | " . SITE['name'],


            ]);
        } else {
            echo $this->view->render("home", [
                "title" => "Home | " . SITE['name'],
            ]);
        }
    }


    public function login($data): void
    {
        $model = new FuncionarioModel();
        $autenticado = User::autenticar($data);
        $this->view->addData(['name' => 'Jonathan']);
        // var_dump($autenticado); 
        if ($autenticado != 0) {
            $user = $model->findById($_SESSION['codUsuario']);
            //  var_dump($user);
            echo $this->view->render("../home", [
                "title" => "Home | " . SITE['name'],
                "user" => $user
            ]);
        } else {
            echo $this->view->render("home", [
                "title" => "Login | " . SITE['name'],
                "error" => "Usuário ou senha Incorreto!"
                //   "autentic" => $autenticado
            ]);
        }
    }

    

    public function logout($data): void
    {
        
        $inicio = User::sair();
        // $users = (new User())->find()->fetch(true);
        // var_dump($autenticado); 
        if ($inicio)
            echo $this->view->render("home", [
                "title" => "Login | " . SITE['name'],
                //   "autentic" => $autenticado
            ]);
    }



    public function contato($data): void
    {
        echo "<h1>Contato</h1>";
        //var_dump($data);
        $url = SITE['root'];
        require __DIR__ . "../../Views/contato.php";
    }


    public function error($data): void
    {

        echo $this->view->render("error", [
            "title" => "Erro | {$data["errcode"]}" . SITE['name'],
            "error" => $data["errcode"]
        ]);
    }
}
