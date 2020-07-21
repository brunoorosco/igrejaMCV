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
      
        $cursos = (new CourseModel())->find()->fetch(true);
        echo $this->view->render("cursos/cursos", [
            "title" => "Cursos | " . SITE['name'],
            "cursos" => $cursos

        ]);
    }

    public function newPage($data): void
    {
        echo $this->view->render("cursos/add", [
            "title" => "Cursos | " . SITE['name'],
            "status" => "Novo Curso",
            "button" => "Enviar",
            "link" => "add",
            "disable" => "enabled",

        ]);
    }

    public function editarPage($data): void
    {
        $curso = (new CourseModel())->findById("{$data["id"]}");
        echo $this->view->render("cursos/add", [
            "title" => "Cursos | " . SITE['name'],
            "curso" => $curso,
            "status" => "Editar Curso",
            "button" => "Atualizar",
            "link" => "edit",
            "disable" => "disabled"

        ]);
    }


    //////função CRUD 

    public function editar($data): void
    {
        $curso = (new CourseModel())->findById("{$data['idCursos']}");

        $jobData = filter_var_array($data, FILTER_SANITIZE_STRING);

        $curso->nomeCursos = $jobData["nomeCursos"];
        $curso->tema = $jobData["tema"];
        $curso->data_ =  $jobData["data_"];


        if ($curso->save()) {
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
        $curso = (new CourseModel());

        $jobData = filter_var_array($data, FILTER_SANITIZE_STRING);

        $curso->nomeCursos = $jobData["nomeCursos"];
        $curso->tema = $jobData["tema"];
        $curso->data_ =  $jobData["data_"];

        if ($curso->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "success",
                "message" => "Curso cadastrado com sucesso!"
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

    public function excluir($data)
    {
        if (empty($data["id"])) return;

        $id = filter_var($data["id"], FILTER_VALIDATE_INT);
        $curso = (new CourseModel())->findById($id);

        if ($curso) {
            $curso->destroy();
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
