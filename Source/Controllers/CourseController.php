<?php

namespace Source\Controllers;

use Source\Models\CourseModel;
use Source\Models\UserModel;
use Source\Models\AlunoModel;
use Source\Models\MembersModel;

class CourseController extends Controller
{
    /** @var UserModal   */
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

    public function list($data): void
    {
        $cem =  $_SESSION['cem'];
        $cursos = (new CourseModel())->find()->fetch(true);
        echo $this->view->render("cursos/cursos", [
            "title" => "Minha CEM | " . SITE['name'],
            "cursos" => $cursos

        ]);
    }

    public function new($data): void
    {
        echo $this->view->render("cem/add", [
            "title" => "Minha CEM | " . SITE['name']

        ]);
    }


    public function atualizar($data): void
    {
        $atualizar = $this->update_create($data, "update");

        if ($atualizar) {
            echo $this->ajaxResponse("message", [
                "type" => "success",
                "message" => "Registro alterado com sucesso!"
            ]);
            return;
        } else {
            echo  $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Não foi possivel alterar!"
            ]);
            return;
        }
    }

    public function adicionar($data): void
    {
        $criar = $this->update_create($data, "create");
        if ($criar) {
            echo $this->ajaxResponse("message", [
                "type" => "success",
                "message" => "Membro cadastrado com sucesso!"
            ]);
            return;
        } else {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Não foi possivel cadastrar!"
            ]);
            return;
        }
    }

    public function update_create($data, $func): bool
    {
        $member = (new CourseModel())->findById($data['idmembros']);

        $jobData = filter_var_array($data, FILTER_SANITIZE_STRING);

        $member->nome = $jobData["nome"];
        $member->email = $jobData["email"];
        $member->nasc =  date("Y-m-d", strtotime(str_replace('/', '-', $jobData["nasc"])));
        $member->cargo = $jobData["cargo"];
        $member->supervisao = $jobData["supervisao"];
        $member->igreja = $jobData["igreja"];
        $member->telefone = $jobData["telefone"];
        $member->endereco = $jobData["endereco"];
        $member->numero = $jobData["numero"];
        //var_dump($member);
        if ($member->save()) return true;
        else return false;
    }

    public function editar($data): void
    {
        $member = (new CourseModel())->findById("{$data["id"]}");
        echo $this->view->render("cem/edit", [
            "title" => "Membros | " . SITE['name'],
            "member" => $member

        ]);
    }
    public function excluir($data)
    {
        if (empty($data["id"])) return;

        $id = filter_var($data["id"], FILTER_VALIDATE_INT);
        $member = (new CourseModel())->findById($id);

        if ($member) {
            $member->destroy();
        }
        $callback = true;
        echo json_encode($callback);
    }

    public function alunos($data)
    {
        $alunos = (new AlunoModel())->find("idcurso= :c", "c={$data['curso']}")->fetch(true);

        foreach ($alunos as $aluno) {
            if (!$aluno->idmembro == null) {
                $membro = (new MembersModel())->findById($aluno->idmembro);
                var_dump($membro->nome);
                echo "<hr>";
            } else {
                var_dump($aluno->nome);
                echo " | não cadastrado";
                echo "<hr>";
            }
        }
    }
}
