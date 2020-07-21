<?php

namespace Source\Controllers;

use Source\Models\UserModel;
use Source\Models\MembersModel;

class UserController extends Controller
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
        $funcionarios = (new UserModel())->find()->fetch(true);
        // var_dump($comps);
        echo $this->view->render("funcionario/todos", [
            "title" => "Funcionários | " . SITE['name'],
            "funcs" => $funcionarios

        ]);
    }
    public function adicionar($email): void
    {
        // echo $email;
        //$user = User::login($email,$senha);
        //$users = (new User())->find()->fetch(true);
        echo $this->view->render("funcionario/novo", [
            "title" => "Home | " . SITE['name']

        ]);
    }
    public function excluir($data): void
    {
        if (empty($data["id"])) return;

        $id = filter_var($data["id"], FILTER_VALIDATE_INT);
        $func = (new UserModel())->findById($id);
        var_dump($func);
        if ($func) {
            $func->destroy();
        }
        $callback = true;
        echo json_encode($callback);
    }

    public function conta()
    {
        echo $this->view->render("funcionario/conta", [
            "title" => "Profile | " . SITE['name'],

        ]);
    }

    public function atualizarAcesso()
    {
        $user = new UserModel();
        $list = $user->find()->fetch(true);
        
       // print_r($list);
        /**@var $userItem User */
        foreach ($list as $userItem) {
             $email = $userItem->username;
             $usuario = (new MembersModel())->find("email = :email", "email={$email}")->fetch();
             
             //$userItem->userID = $usuario->idmembros; //insere o idmembro para userID de acesso
             //$userItem->username = ""; //limpa campo email 
             

             if($userItem->save()){
                 echo $usuario->idmembros.' - '.$userItem->id.' - '.$userItem->username.' -> OK ' ;
             };
             if($userItem->fail()){
                echo $userItem->fail()->getMessage();
             }
            // $userItem->CNPJ = $cnpj;
            // $userItem->save();
           
            echo '<br>';

            //   foreach ($userItem->addresses() as $address) {
             //  var_dump($address->data());
            //   }
        }
    }
}
