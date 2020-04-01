<?php

namespace Source\Controllers;

use Source\Models\IgrejaModel;
use Source\Models\UserModel;

class IgrejaController extends Controller
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

    public function index($igreja):void
    {  
       // echo $email;
       //$user = User::login($email,$senha);
       $igrejas = (new IgrejaModel())->find()->fetch(true);
      // var_dump($comps);
       echo $this->view->render("igreja/index",[
           "title" => "Igrejas | ". SITE['name'],
           "igrejas" => $igrejas
           
       ]);
    }
    public function create($igreja):void
    {  
       // echo $email;
       //$user = User::login($email,$senha);
     //$users = (new User())->find()->fetch(true);
       echo $this->view->render("../composicao/add",[
           "title" => "Home | ". SITE['name']
           
       ]);
    }

    public function edit($igreja):void
    {
      // $users = (new User())->find()->fetch(true);
       echo $this->view->render("login/login",[
           "title" => "Composições | ",
           
       ]);
    }

    public function delete($data):void
    {
        if (empty($data["id"])) return;

        $id = filter_var($data["id"], FILTER_VALIDATE_INT);
        $equip = (new IgrejaModel())->findById($id);
        var_dump($equip);
        if ($equip) {
            $equip->destroy();
        }
        $callback = true;
        echo json_encode($callback);
    }

}