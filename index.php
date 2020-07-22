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
$route->get("/", "Web:login", "web.login");
$route->get("/cadastrar", "Web:register", "web.register");
$route->get("/recuperar", "Web:forget", "web.forget");
$route->get("/senha/{email}/{forget}", "Web:reset", "web.reset");
/**
 * Auth
 */
$route->group(null);
$route->post("/login", "Auth:login", "auth.login");
$route->post("/register", "Auth:register", "auth.register");
$route->post("/forget", "Auth:forget", "auth.forget");
$route->post("/reset", "Auth:reset", "auth.reset");

/**
 * App
 */
$route->group("/app");
$route->get("/", "App:home", "app.home");
$route->get("/painel", "App:painel", "app.painel");
$route->get("/sair", "App:logoff", "app.logoff");

/**
 * Alunos
 */
$route->group("/aluno");
$route->get("/update", "AlunoController:updateDb", "alunocontroller.updatedb");
//$route->get("/sair", "AlunoController:logoff","app.logoff");


$route->group("/atualizacao");
$route->get("/cargos","atualizacaoController:atualizarCargo", "atualizacaocontroller.atualizarcargo");
$route->get("/cem","atualizacaoController:atualizarCEM", "atualizacaocontroller.atualizarcem");
$route->get("/cem-encontrista","atualizacaoController:atualizarCemEncontro", "atualizacaocontroller.atualizarcemencontro");
$route->get("/encontro","atualizacaoController:atualizarEncontroEncontrista", "atualizacaocontroller.atualizarencontroencontrista");



//$route->get("/sair", "AlunoController:logoff","app.logoff");

/**
 * controller: 
 * BATISMO
 */
////GET
$route->group("/batismo");
$route->get("/", "BatController:list", "batcontroller.list");
$route->get("/add", "BatController:new", "batcontroller.new");
////POST
$route->group("/batismo");
$route->post("/add", "CompController:adicionar");
$route->delete("/excluir", "CompController:excluir");
///PUT
$route->put("/edit/{id}", "CompController:editar");
////DELETE


/**
 * webEmpresa
 * Empresa
 */
$route->group("/cem");
$route->get("/", "cemController:cem");
$route->get("/add", "cemController:incluir","cemcontroller.incluir");
$route->post("/add", "cemController:adicionar");
$route->get("/transfer/{id}", "cemController:pageTransfer","cemcontroller.pagetransfer");
$route->post("/transfer", "cemController:update");

/**
 * controller: Composicao
 * CURSO
 */
////GET
$route->group("/cursos");
$route->get("/", "CourseController:list", "coursecontroller.list");
$route->get("/add", "CourseController:newPage", "coursecontroller.newpage");
$route->get("/{curso}/alunos", "CourseController:alunos", "coursecontroller.alunos");
$route->get("/edit/{id}", "CourseController:editarPage", "CourseController:editarpage");

////POST
$route->group("/cursos");
$route->post("/add", "CourseController:adicionar", "coursecontroller.adicionar");
$route->post("/edit", "CourseController:editar", "coursecontroller.editar");
$route->delete("/excluir", "CourseController:excluir", "coursecontroller.excluir");
///PUT
////DELETE


/**
 * EncontroController
 * acesso responsavel pelas normas 
 */
$route->group("/encontro");
$route->get("/", "EncontroController:encontros", "encontrocontroller.encontros");
$route->get("/add", "EncontroController:cadastroPage", "encontrocontroller.cadastropage");
$route->get("/edit/{id}", "EncontroController:editPage", "encontrocontroller.editpage");

$route->post("/add", "EncontroController:create",'encontrocontroller.create');
$route->post("/edit", "EncontroController:update",'encontrocontroller.update');
$route->delete("/excluir", "EncontroController:delete",'encontrocontroller.delete' );

/**
 * EncontristaController
 * acesso responsavel pelas normas 
 */
$route->group("/encontrista");
$route->get("/{encontro}", "EncontristaController:index", "encontristacontroller.index");
$route->get("/add", "EncontristaController:cadastroPage", "encontristacontroller.cadastropage");
$route->get("/edit/{id}", "EncontristaController:editPage", "encontristacontroller.editpage");

$route->post("/add", "EncontristaController:create",'encontristacontroller.create');
$route->post("/edit", "EncontristaController:update",'encontristacontroller.update');
$route->delete("/excluir", "EncontristaController:delete",'encontristacontroller.delete' );

/**
 * controller: Equipamentos
 * Composições
 */
$route->group("igrejas");
$route->get("/", "IgrejaController:index");
$route->post("/add", "IgrejaController:create");
$route->put("/edit/{id}", "igrejaController:edit");
$route->delete("/excluir", "igrejaController:delete");


//$route->post("/busca/?{id}","cemController:buscar");
/**
 * ControllerMembros
 * acesso responsavel pelas normas 
 */
$route->group("/membros");
$route->get("/", "MembersController:index", "memberscontroller.index");  //index controllerCem
$route->get("/add", "MembersController:cadastroPage", "memberscontroller.cadastropage");  //member create controllerCem
$route->get("/edit/{id}", "MembersController:editarPage", "memberscontroller.editarpage");
$route->post("/add", "MembersController:create", "memberscontroller.create");  //member create controllerCem
$route->post("/edit", "MembersController:update", "memberscontroller.update");  //member create controllerCem
$route->delete("/excluir", "MembersController:excluir", "memberscontroller.excluir");


$route->group("/minhacem");
$route->get("/", "MembersController:index", "memberscontroller.index");  //index controllerCem



/**
 * controller: FuncionarioController
 * Funcionarios
 */
$route->group("func");
$route->get("/", "FuncionarioController:todos");
$route->get("/add", "FuncionarioController:adicionar");
$route->post("/add", "FuncionarioController:adicionar");
$route->put("/edit/{id}", "FuncionarioController:editar");
$route->delete("/excluir", "FuncionarioController:excluir");
$route->get("/conta", "FuncionarioController:conta");

/**
 * NormaController
 * acesso responsavel pelas normas 
 */
$route->group("/norma");
$route->get("/", "NormaController:normas");
$route->get("/editar/{id}", "NormaController:editar");
$route->post("/add", "NormaController:adicionar");
$route->post("/edit", "NormaController:atualizar");
$route->delete("/excluir", "NormaController:excluir");



$route->group("/produtos");
$route->get("/", "ProdutoController:index");
$route->get("/add", "ProdutoController:adicionar");
$route->get("/edit/{id}", "ProdutoController:editar");
$route->post("/add", "ProdutoController:create");
$route->post("/edit", "ProdutoController:update");
$route->delete("/excluir", "ProdutoController:delete");
$route->get("/entrada", "ProdutoController:entrada");
$route->get("/saida", "ProdutoController:saida");


$route->group("/atualizar");
$route->get("/username", "atualizacaoController:atualizarAcesso", "atualizacaocontroller.atualizaracesso");
$route->get("/encontrista", "atualizacaoController:atualizaCemEncontro", "atualizacaocontroller.atualizacemencontro");
$route->get("/encontro", "atualizacaoController:atualizaEncontroEncontrista", "atualizacaocontroller.atualizaencontroencontrista");
$route->get("/cem", "atualizacaoController:atualizarCEM", "atualizacaocontroller.atualizacem");
$route->get("/cargo", "atualizacaoController:atualizaCargo", "atualizacaocontroller.atualizacargo");

$route->group("/venda");
$route->get("/", "VendasController:index", "vendascontroller.index");
$route->get("/", "VendasController:add", "vendascontroller.add");
$route->get("/", "VendasController:edit", "vendascontroller.edit");
$route->post("/item", "VendasController:create", "vendascontroller.create");



$route->group("/auto");
$route->post("/item", "autoController:item","autocontroller.item" );
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
