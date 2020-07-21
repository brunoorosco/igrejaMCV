<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="<?= asset('img/Favicon.ico') ?>" type="image/x-icon">
  <link href='<?= asset('bootstrap/css/bootstrap.min.css') ?>' rel="stylesheet">
  <link href='<?= asset('font-awesome/css/font-awesome.css') ?>' rel="stylesheet">
  <link href="<?= asset('css/sidebar.css') ?>" rel="stylesheet">
  <link href="<?= asset('css/tabela.css') ?>" rel="stylesheet">
  <link href="<?= asset('css/form.css') ?>" rel="stylesheet">
  <link href="<?= asset('css/load.css') ?>" rel="stylesheet">
  <link href="<?= asset('css/message.css') ?>" rel="stylesheet">
  <link href="<?= asset('css/globalStyles.css') ?>" rel="stylesheet">
  <!-- Toastr style -->
  <link href="<?= asset('css/plugins/toastr/toastr.min.css') ?>" rel="stylesheet">

  <?= $v->section("css"); ?>

  <title><?= $v->e($title) ?></title>
</head>

<body>
  <div>
    <div class="ajax_load">
      <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <div class="ajax_load_box_title">Aguarde, carrengando...</div>
      </div>
    </div>


    <nav class="vav text-white navbar" style="background: #3f51b5;">
      <div class="col-4 d-flex">
        <a class="navbar-brand" id="close-sidebar">
          <i class="fa fa-bars"></i>
        </a>
        <a class="navbar-brand text-white" href="<?= url("") ?>">
          <h4>Secretária Aviva</h4>
        </a>

      </div>
      <div class="col-4"></div>
      <div class="col-4 text-right">

        <strong class="text-white"><?= $_SESSION['userName'] ?></strong>
        <a class="btn" href="<?= $router->route("app.logoff"); ?>"> <i class="text-white fa fa-power-off"></i></a>
      </div>
    </nav>


    <div class="page-wrapper  toggled">
      <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fa fa-share"></i>
      </a>
      <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">

          <div class="sidebar-menu">

            <ul>
              <li class="header-menu">
                <span class="text-black-50">Menu</span>
              </li>

              <li>

                <a href="<?= url(); ?>">
                  <i class="fa fa-bar-chart"></i>
                  Dashboard
                </a>

              </li>
              <!-- Libera item para quem é responsavel pelo administrativo das igrejas -->
              <?php if ($_SESSION['userJob'] == 1) : ?>
                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="fa fa-archive"></i>
                    <span>Secretária Geral</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li><a href="<?= url("batismo"); ?>">Batismo</a></li>
                      <li><a href="<?= url("cem/add"); ?>">Cadastro de CEM</a></li>
                      <li><a href="<?= url("igreja/add"); ?>">Cadastro de Igreja</a></li>
                      <li><a href="<?= url("cursos"); ?>">Consulta de Cursos</a></li>
                    </ul>
                  </div>
                </li>
              <?php endif; ?>

              <?php if ($_SESSION['userJob'] == 1) : ?>
                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="fa fa-archive"></i>
                    <span>Secretária Encontro</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li><a href="<?= url("encontrista"); ?>">Encontristas</a></li>
                      <li><a href="<?= url("encontro"); ?>">Encontro/Reencontro</a></li>
                      <li><a href="<?= url("equipe"); ?>">Equipe</a></li>
                      <li><a href="<?= url("caixa"); ?>">Entrada/Saída $$$</a></li>
                    </ul>
                  </div>
                </li>
              <?php endif; ?>


              <li class="sidebar-dropdown">
                <a href="#">
                  <i class="fa fa-child"></i>
                  <span>Minha CEM</span>

                </a>
                <div class="sidebar-submenu">
                  <ul>
                    <li><a href="<?= url("membros"); ?>">Membros</a></li>
                    <li><a href="<?= url("minhacem/casadepaz"); ?>">Casa de Paz</a></li>
                    <li><a href="<?= url("minhacem/discipulado"); ?>">Discipulado</a></li>
                    <li><a href="<?= url("minhacem/escoladeprofeta"); ?>">Escola de Profeta</a></li>
                    <li><a href="<?= url("minhacem/transfer"); ?>">Transferência de Membro</a></li>
                  </ul>
                </div>
              </li>
              <li class="sidebar-dropdown">
                <a href="#">
                  <i class="fa fa-search"></i>
                  <span>Consulta</span>

                </a>
                <div class="sidebar-submenu">
                  <ul>
                    <li><a href="<?= url("eventos/list"); ?>">Eventos</a></li>
                    <li><a href="<?= url("igrejas"); ?>">Igrejas</a></li>
                    <li><a href="<?= url("cem"); ?>">CEM's</a></li>
                    <li><a href="<?= url("equipamento"); ?>">Equipamentos</a></li>
                    <li>
                      <a href="#">Outros</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="sidebar-dropdown">
                <a href="#">
                  <i class="fa fa-print"></i>
                  <span>Downloads</span>
                </a>
                <div class="sidebar-submenu">
                  <ul>
                    <li>
                      <a href="#">Ficha Encontro</a>
                    </li>
                    <li>
                      <a href="#">Logo</a>
                    </li>
                    <li>
                      <a href="#">Grupo de Apoio</a>
                    </li>
                    <li>
                      <a href="#">Certificado de Batismo</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="sidebar-dropdown">
                <a href="#">
                  <i class="fa fa-plus"></i>
                  <span>Ministérios</span>
                </a>
                <div class="sidebar-submenu">
                  <ul>
                    <li>
                      <a href="#">Aviva Produções</a>
                    </li>
                    <li>
                      <a href="#">Quatro Seres</a>
                    </li>
                    <li>
                      <a href="#">Obreiros</a>
                    </li>
                    <li>
                      <a href="#">Kids</a>
                    </li>
                  </ul>
                </div>
              </li>

                <li class="header-menu">
                  <span class="text-black-50">Extra</span>
                </li>
                <li>
                  <a href="<?= url("atendimento"); ?>">
                    <i class="fa fa-book"></i>
                    <span>Plano de Atendimento</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-calendar"></i>
                    <span>Calendário Anual</span>
                  </a>
                </li>
                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="fa fa-child"></i>
                    <span>Comércio</span>

                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li><a href="<?= url("app/painel"); ?>">PDV</a></li>
                      <li><a href="<?= url("produtos/add"); ?>">Cadastro de Produtos</a></li>
                      <li><a href="<?= url("produtos"); ?>">Produtos</a></li>
                      <li><a href="<?= url("produtos/entrada"); ?>">Entrada Estoque</a></li>
                      <li><a href="<?= url("produtos/saida"); ?>">Saída Estoque</a></li>
                    </ul>
                  </div>
                </li>

            </ul>
          </div>
          <!-- sidebar-menu  -->
        </div>

      </nav>

      <!-- sidebar-wrapper  -->
      <main class="page-content">
        <!-- <header>
        <img src="<?= asset('img/logo.jpg') ?>" alt="" width="100px">
        <?= $v->section("php") ?>
        <a href="<?= $router->route("app.logoff") ?>" class="button"><i class="fa fa-power-off" style="color:red"></i></a>
      </header> -->

        <?= $v->section("content"); ?>
      </main>
      <!-- page-content" -->
    </div>
  </div>
  <!-- page-wrapper -->
  <!-- Mainly scripts -->
  <script src="<?= asset('js/jquery-3.4.1.js') ?>"></script>

  <script src="<?= asset('js/popper.js') ?>"></script>
  <script src="<?= asset('bootstrap/js/bootstrap.min.js') ?>"></script>
  <script src="<?= asset('js/sweetalert.min.js') ?>"></script>
  <!-- jQuery UI -->
  <script src="<?= asset('js/jquery-ui.min.js') ?>"></script>

  <script src="<?= asset('js/sidebar.js') ?>"></script>
  <script src="<?= asset('js/form.js') ?>"></script>
  <script src="<?= asset('js/jquery.mask.min.js') ?>"></script>



  <?= $v->section("js"); ?>

</body>

</html>