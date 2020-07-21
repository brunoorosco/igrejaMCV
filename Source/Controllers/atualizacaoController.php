<?php

namespace Source\Controllers;

use Source\Models\UserModel;
use Source\Models\MembersModel;
use Source\Models\CargoModel;
use Source\Models\CemModel;
use Source\Models\EncontristaModel;
use Source\Models\linkEncontroModel;
use Source\Models\EncontroModel;

class atualizacaoController extends Controller
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




    public function atualizarCEM()
    {
        $membros = (new MembersModel())->find()->fetch(true);
        /**@var $userItem User */
        foreach ($membros as $membro) {

            if (!is_numeric($membro->supervisao)) {
                $cem = (new CemModel())->find("nome_cem = :c", "c={$membro->supervisao}")->fetch();

                $membro->supervisao = $cem->id;
                echo $membro->email . ' - ' . $membro->cargo . ' - ' . $cem->id . ' -> OK';

                if (!is_null($membro->supervisao)) {
                    if ($membro->save()) {
                        echo $membro->email . ' - ' . $membro->supervisao . ' - ' . $cem->id . ' -> OK';
                    } else {
                        echo $membro->fail()->getMessage();
                    }
                }

                echo '<br>';
            }
        }
    }

    public function atualizaEncontroEncontrista()
    {
        $encontristas =  (new EncontristaModel())->find()->fetch(true);
        /**@var $userItem User */
        foreach ($encontristas as $encontrista) {

            $encontro = (new EncontroModel())->find("n_encontro= :enc", "enc={$encontrista->idEncontro}")->limit(1)->fetch(false);
            $encontrista->idEncontro = $encontro->id;
           
            //ATUALIZAÇÃO DO N D EENCONTRO NO CADASTRO DO ENCONTRISTA
            if ($encontrista->save()) {
                echo $encontrista->nomeEnc;
                echo $encontrista->n_encontro;
                echo ' - OK!!!!<br>';
            } else {
                echo $encontrista->fail()->getMessage();
                echo "FALHA!!!!<br>";
            }
        }
    }
    
    // public function atualizaEncontroEncontrista()
    // {
    //     $encontristas = (new linkEncontroModel())->find()->fetch(true);

    //     /**@var $userItem User */
    //     foreach ($encontristas as $encontrista) {

    //         $encontrista_ = (new EncontristaModel())->findById($encontrista->encontrista);
    //         $encontrista_->idEncontro = $encontrista->n_encontro;

    //         //ATUALIZAÇÃO DO N D EENCONTRO NO CADASTRO DO ENCONTRISTA
    //         if ($encontrista_->save()) {
    //             echo $encontrista_->nomeEnc;
    //             echo $encontrista->n_encontro;
    //             echo ' - OK!!!!<br>';
    //         } else {
    //             echo $encontrista_->fail()->getMessage();
    //             echo "FALHA!!!!<br>";
    //         }
    //     }
    // }

    public function atualizaCemEncontro()
    {

        $encontristas = (new EncontristaModel())->find()->fetch(true);

        foreach ($encontristas as $encontrista) {

            $cem = (new CemModel())->find("nome_cem = :n", "n={$encontrista->CEM}")->fetch(false);

            $encontrista->idCem = $cem->id;

            // //ATUALIZAÇÃO DO N D EENCONTRO NO CADASTRO DO ENCONTRISTA
            if (!empty($cem->id)) {
                if ($encontrista->save()) {
                    echo $encontrista->nomeEnc;
                    echo $encontrista->idCem;
                    echo ' - OK!!!!<br>';
                } else {
                    echo $encontrista->fail()->getMessage();
                    echo "FALHA!!!!<br>";
                }
            }
        }
    }
    public function atualizaCargo()
    {
        $membros = (new MembersModel())->find()->fetch(true);
        /**@var $userItem User */
        foreach ($membros as $membro) {

            if (!is_numeric($membro->cargo)) {
                $cargo = (new CargoModel())->find("cargo = :c", "c={$membro->cargo}")->fetch();

                $membro->cargo = $cargo->id;
                //echo $membro->email . ' - ' . $membro->cargo . ' - ' . $cargo->id . ' -> OK';

                if ($membro->save()) {
                    echo $membro->email . ' - ' . $membro->cargo . ' - ' . $cargo->id . ' -> OK';
                };
                if ($membro->fail()) {
                    echo $membro->fail()->getMessage();
                }

                echo '<br>';
            }
        }
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

            $userItem->userID = $usuario->idmembros; //insere o idmembro para userID de acesso
            $userItem->username = ""; //limpa campo email 

            var_dump($userItem->userID);
            if ($userItem->save()) {
                echo $usuario->idmembros . ' - ' . $userItem->id . ' - ' . $userItem->username . ' -> OK ';
            };
            if ($userItem->fail()) {
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
