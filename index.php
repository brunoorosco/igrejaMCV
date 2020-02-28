<?php
ob_start();
session_start();

require __DIR__ . "/vendor/autoload.php";
use  CoffeeCode\Router\Router;

$route = new Router(url());
$route->namespace("Source\Controllers");

/**
 * web
 */
$route->group(null);
$route->get("/", "Web:login","web.login");
$route->get("/cadastrar", "Web:register","web.register");
$route->get("/recuperar", "Web:forget", "web.forget");
$route->get("/senha/{email}/{forget}", "Web:reset", "web.reset");
/**
 * Auth
 */
$route->group(null);
$route->post("/login", "Auth:login","auth.login");
$route->post("/register", "Auth:register","auth.register");
$route->post("/forget", "Auth:forget", "auth.forget");
$route->post("/reset", "Auth:reset", "auth.reset");

/**
 * App
 */
$route->group("/app");
$route->get("/", "App:home","app.home");
$route->get("/sair", "App:logoff","app.logoff");


/**
 * web
 * etiquetas
 */
$route->group("etiqueta");
$route->get("/","Atendimento:etiqueta");
$route->get("/busca","Atendimento:buscaEtiqueta");

/**
 * web
 * Atendimento de empresas
 */
$route->group("/atendimento");
$route->get("/", "Atendimento:atendimento");
$route->get("/plano", "Atendimento:plano");
$route->post("/plano", "Atendimento:adicionar");
$route->post("/empresa", "webEmpresa:buscar");
$route->post("/autoEnsaio", "Atendimento:carregaEnsaio");
$route->post("/auto", "Atendimento:carregaNorma");
$route->post("/os", "OrcamentoController:adicionar");
$route->post("/os/excluir", "OrcamentoController:excluir");


/**
 * controller: Composicao
 * BATISMO
 */
////GET
$route->group("/batismo");
$route->get("/", "BatController:list", "batcontroller.list");
$route->get("/add", "BatController:new", "batcontroller.new");
////POST
$route->group("/batismo");
$route->post("/add", "CompController:adicionar");
$route->post("/excluir", "CompController:excluir");
///PUT
$route->put("/edit/{id}", "CompController:editar");
////DELETE

/**
 * controller: Composicao
 * BATISMO
 */
////GET
$route->group("/curso");
$route->get("/", "CourseController:list", "coursecontroller.list");
$route->get("/add", "CourseController:new", "coursecontroller.new");
////POST
$route->group("/batismo");
$route->post("/add", "CourseController:adicionar", "coursecontroller.adicionar");
$route->post("/excluir", "CourseController:excluir", "coursecontroller.excluir");
///PUT
$route->put("/edit/{id}", "CourseController:editar", "coursecontroller.editar");
////DELETE


$route->group("/minhacem");
$route->get("/", "cemController:cem");
$route->get("/edit/{id}", "cemController:editar", "cemcontroller.editar");
$route->get("/buscar", "cemController:buscar", "cemcontroller.buscar");

$route->post("/excluir", "cemController:excluir");
$route->post("/edit", "cemController:atualizar","cemcontroller.atualizar");

/**
 * webEmpresa
 * Empresa
 */
$route->group("/cem");
$route->get("/", "cemController:cem");
$route->get("/add", "cemController:incluir");
$route->post("/add", "cemController:adicionar");

//$route->post("/busca/?{id}","cemController:buscar");
/**
 * NormaController
 * acesso responsavel pelas normas 
 */
$route->group("/encontro");
$route->get("/","EncontroController:ensaios","encontrocontroller.ensaios");
$route->get("/editar/{id}","EncontroController:editar","encontrocontroller.ensaios");

$route->post("/add","EncontroController:adicionar");
$route->post("/edit","EncontroController:atualizar");
$route->post("/excluir","EncontroController:excluir");


/**
 * controller: Equipamentos
 * Composições
 */
$route->group("equipamento");
$route->get("/", "EquipController:todos");
$route->get("/add", "EquipController:incluir");
$route->post("/add", "EquipController:adicionar");
$route->get("/editar/{id}", "EquipController:editar");
$route->post("/excluir", "EquipController:excluir");
$route->post("/edit", "EquipController:editar");
/**
 * controller: FuncionarioController
 * Funcionarios
 */
$route->group("func");
$route->get("/", "FuncionarioController:todos");
$route->get("/add", "FuncionarioController:adicionar");
$route->post("/add", "FuncionarioController:adicionar");
$route->put("/edit/{id}", "FuncionarioController:editar");
$route->post("/excluir", "FuncionarioController:excluir");
$route->get("/conta", "FuncionarioController:conta");

/**
 * NormaController
 * acesso responsavel pelas normas 
 */
$route->group("norma");
$route->get("/","NormaController:normas");
$route->get("/editar/{id}","NormaController:editar");
$route->post("/add","NormaController:adicionar");
$route->post("/edit","NormaController:atualizar");
$route->post("/excluir","NormaController:excluir");





$route->group("autocomplete");
$route->get("/?", "WebEmpresa:buscar");
/**
 * ERROR
 */
$route->group("ops");
$route->get("/{errcode}", "Web:error");

/**
 * PROCESS
 */
$route->dispatch();

if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();