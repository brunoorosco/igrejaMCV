<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?= asset('Favicon.ico') ?>" type="image/x-icon">
  <link href='<?= asset('bootstrap/css/bootstrap.min.css') ?>' rel="stylesheet">
  <link href='<?= asset('font-awesome/css/font-awesome.css') ?>' rel="stylesheet">
  <link href="<?= asset('css/sidebar.css') ?>" rel="stylesheet">
  <link href="<?= asset('css/tabela.css') ?>" rel="stylesheet">
  <link href="<?= asset('css/form.css') ?>" rel="stylesheet">
  <link href="<?= asset('css/load.css') ?>" rel="stylesheet">
  <link href="<?= asset('css/message.css') ?>" rel="stylesheet">
  <!-- Toastr style -->
  <link href="<?= asset('css/plugins/toastr/toastr.min.css') ?>" rel="stylesheet">

  <?= $v->section("css"); ?>

  <title><?= $v->e($title) ?></title>
</head>

<body>
  <div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
      <i class="fa fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
      <div class="sidebar-content">
        <div class="sidebar-brand">
          <a href="#" class="text-white">Secretária Aviva</a>
          <div id="close-sidebar">
            <i class="fa fa-times"></i>
          </div>
        </div>
        <div class="sidebar-header">
          <div class="user-pic">
            <img alt="image" class="img-circle" src="<?= asset('img/avatar-2.png') ?>" width="45" />
          </div>
          <div class="user-info">
            <span class="user-name">
              <strong class="text-white"><?= $_SESSION['userName'] ?></strong>
            </span>
            <span class="user-role text-white">Administrator</span>
            <span class="user-status">
              <i class="fa fa-circle"></i>
              <span>Online</span>
            </span>
          </div>
        </div>
        <!-- sidebar-header  -->
        <!-- <div class="sidebar-search">
          <div>
            <div class="input-group">
              <input type="text" class="form-control search-menu" placeholder="Search...">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </span>
              </div>
            </div>
          </div>
        </div> -->
        <!-- sidebar-search  -->
        <div class="sidebar-menu">
          <ul>
            <li class="header-menu">
              <span class="text-black-50">Geral</span>
            </li>
            <li>
              <a href="<?= url(); ?>">
                <i class="fa fa-bar-chart"></i>
                <span>Dashboard</span>
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
                    <li><a href="<?= url("cursos"); ?>">Consulta de Cursos</a></li>
                  </ul>
                </div>
              </li>
            <?php endif; ?>


            <li class="sidebar-dropdown">
              <a href="#">
                <i class="fa fa-child"></i>
                <span>Minha CEM</span>
                <span class="badge badge-pill badge-warning">New</span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li><a href="<?= url("minhacem"); ?>">Membros</a></li>
                  <li><a href="<?= url("empresa/add"); ?>">Discipulado</a></li>
                  <li><a href="<?= url("func/add"); ?>">Escola de Profeta</a></li>
                  <li><a href="#">Normas</a> </li>
                  <li><a href="../produtos/" class="lk_lista">Produtos</a></li>
                  <li><a href="../ensaios/" class="lk_lista">Tipos de Ensaios</a></li>
                  <li><a href="../tiposTecido/" class="lk_lista">Tipos de Tecidos</a></li>
                </ul>
              </div>
            </li>
            <li class="sidebar-dropdown">
              <a href="#">
                <i class="fa fa-search"></i>
                <span>Consulta</span>
                <span class="badge badge-pill badge-danger">3</span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li><a href="<?= url("minhacem"); ?>">Membros da CEM</a></li>
                  <li><a href="<?= url("igreja"); ?>">Igrejas</a></li>
                  <li><a href="<?= url("cem"); ?>">CEM's</a></li>
                  <li><a href="<?= url("equipamento"); ?>">Equipamentos</a></li>
                  <li><a href="<?= url("func"); ?>">Funcionários</a></li>
                  <li><a href="<?= url("atendimento/plano"); ?>">Plano de Atendimento</a></li>
                  <li><a href="<?= url("norma"); ?>">Normas</a></li>
                  <li><a href="<?= url("orcamento"); ?>">Orçamentos</a></li>
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
            <li class="sidebar-dropdown">
              <a href="#">
                <i class="fa fa-globe"></i>
                <span>Maps</span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li>
                    <a href="#">Google maps</a>
                  </li>
                  <li>
                    <a href="#">Open street map</a>
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
                <span>Calendar</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-folder"></i>
                <span>Examples</span>
              </a>
            </li>
          </ul>
        </div>
        <!-- sidebar-menu  -->
      </div>
      <!-- sidebar-content  -->
      <div class="sidebar-footer ">
        <a href="#">
          <i class="fa fa-bell text-muted"></i>
          <span class="badge badge-pill badge-warning notification">3</span>
        </a>
        <a href="#">
          <i class="fa fa-envelope text-muted"></i>
          <span class="badge badge-pill badge-success notification">7</span>
        </a>
        <a href="#">
          <i class="fa fa-cog text-muted"></i>
          <span class="badge-sonar"></span>
        </a>
        <a href="<?= $router->route("app.logoff"); ?>">
          <i class="fa fa-power-off text-muted"></i>
        </a>
      </div>
    </nav>

    <!-- sidebar-wrapper  -->
    <main class="page-content">
      <div class="ajax_load">
        <div class="ajax_load_box">
          <div class="ajax_load_box_circle"></div>
          <div class="ajax_load_box_title">Aguarde, carrengando...</div>
        </div>
      </div>
      <?= $v->section("content"); ?>
    </main>
    <!-- page-content" -->
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