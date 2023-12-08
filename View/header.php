<?php
include('../DAO/Crud.php');
include('../Model/Enum/StatusActivit.php');

#Authetication session
session_start();
if ($_SESSION['id_user'] == "" || $_SESSION['id_user'] == null) {
  header('location:login.php');
}

#Verification of deadline task to show it as delayed task
$crud = new Crud();
$dateTime = new DateTime();

$all_tasks = $crud->selectBD("task", "*", "");
foreach ($all_tasks as $task) {
  $now = $dateTime->format('Y-m-d H:i:s');
  $deadline = strtotime($task['deadline']);
  if ($deadline < $now && $task['status'] == "Pendente") {
    $crud->updateBD("task", "status=?", "id_task = '{$task['id_task']}'", array(StatusActivit::Atrazado->name));
  }
}

function time_manage($create_date, $dateTime)
{
  $new_date = strtotime($create_date);
  return date(' l d M - H:i', $new_date);
}

#Counting the notification
$count_notice = $crud->selectBD("notice", "count(*)", "where id_destin = '{$_SESSION['id_user']}' and status = 'Pendente'");

#Counting the message
$count_message = $crud->selectBD("message", "count(*)", "where id_destin = '{$_SESSION['id_user']}' and status = 'Pendente'");

?>
<!-- Favicons -->
<link href="../assets/img/sweetLogo.png" rel="icon">
<link href="../assets/img/sweetLogo.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link
  href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
  rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
<link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
<link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="../assets/css/style.css" rel="stylesheet">

<!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * Editor: Jeremias Dinzinga
  * Updated by Editor: Oct 31 2023 with Bootstrap v5.3.2
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="../assets/img/sweetLogo.png" alt="">
        <span class="d-none d-lg-block">SweetTeam</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Pesquisar" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">
              <?php echo $count_notice["count(*)"] ?>
            </span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              <?php if ($count_notice["count(*)"] != 0) {
                echo ("Há " . $count_notice["count(*)"] . " novas notificações");
              } else {
                echo ("Nenhuma notificação");
              } ?>
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">Ver todas</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <?php

            $my_notices = $crud->selectByFieldBD("notice", "*", "where id_destin = '{$_SESSION['id_user']}' and status = 'Pendente'");

            if ($my_notices != null) {
              foreach ($my_notices as $item) {
                ?>

                <li class="notification-item">
                  <i <?php if ($item["title"] != "Removido do projecto")
                    echo "hidden" ?> class="bi bi-x-circle text-danger"></i>
                    <i <?php if ($item["title"] != "Adicionado ao projecto")
                    echo "hidden" ?>
                      class="bi bi-check-circle text-success"></i>
                    <div>
                      <h4>
                      <?php echo $item["title"] ?>
                    </h4>
                    <p>
                      <?php echo $item["content"] ?>
                    </p>
                    <p>
                      <?php echo (time_manage($item["create_date"], $dateTime)) ?> min
                    </p>
                  </div>
                </li>
                <?php
              }
            }
            ?>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Todas notificações</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">
              <?php echo $count_message["count(*)"] ?>
            </span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              <?php if ($count_message["count(*)"] != 0) {
                echo ("Há " . $count_message["count(*)"] . " mensagens novas");
              } else {
                echo ("Nenhuma mensagem");
              } ?>
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">Ver todas</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <?php

            $my_messages = $crud->selectByFieldBD("message", "*", "where id_destin = '{$_SESSION['id_user']}' and status = 'Pendente'");

            if ($my_messages != null) {
              foreach ($my_messages as $item) {
                ?>

                <li class="message-item">
                  <a href="#">
                    <img src="../assets/img/messages-1.jpg" alt="" class="rounded-circle">
                    <div>
                      <h4>Maria Hudson</h4>
                      <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                      <p>4 hrs. ago</p>
                    </div>
                  </a>
                </li>
                <?php
              }
            }
            ?>
            <li>
              <hr class="dropdown-divider">
            </li>                    

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?php echo $_SESSION['photo']; ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">
              <?php echo $_SESSION['user_name']; ?>
            </span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>
                <?php echo $_SESSION['user_name']; ?>
              </h6>
              <span>
                <?php echo $_SESSION['profession']; ?>
              </span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="profile.php">
                <i class="bi bi-person"></i>
                <span>Meu Perfil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="fq.php">
                <i class="bi bi-question-circle"></i>
                <span>Ajuda?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Terminar sessão</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="ri-apps-line"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse"
          href="projects.php?target=all">
          <i class="bi bi-menu-button-wide"></i><span>Projectos</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="projects.php?target=all">
              <i class="bi bi-menu-button-wide"></i><span>Todos</span>
            </a>
          </li>
          <li>
            <a href="projects.php?target=pending">
              <i class="ri-history-line"></i><span>Pendente</span>
            </a>
          </li>
          <li>
            <a href="projects.php?target=canceled">
              <i class="ri-close-circle-line"></i><span>Cancelado</span>
            </a>
          </li>
          <li>
            <a href="projects.php?target=achived">
              <i class="ri-checkbox-circle-line"></i><span>Concluido</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="tasks.php">
          <i class="bi bi-journal-text"></i><span>Tarefas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li class="nav-item">
            <a href="tasks.php?target=all">
              <i class="bi bi-clipboard"></i><span>Todos</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="tasks.php?target=pending">
              <i class="ri-history-line"></i><span>Pendente</span>
            </a>
          </li>
          <li>
            <a href="tasks.php?target=overtime">
              <i class="ri-alarm-warning-line"></i><span>Atrazado</span>
            </a>
          </li>
          <li>
            <a href="tasks.php?target=achived">
              <i class="ri-checkbox-circle-line"></i><span>Concluido</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="collaboratores.php">
          <i class="ri-team-line"></i><span>Colaboradores</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="collaboratores.php?target=all">
              <i class="ri-open-arm-line"></i><span>Disponível</span>
            </a>
          </li>
          <li>
            <a href="collaboratores.php?target=shared">
              <i class="ri-contacts-line"></i><span>Partilhado</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="fq.php">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="sendMessage.php">
          <i class="bi bi-pencil"></i>
          <span>Escrever</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="addProject.php">
          <i class="bi bi-file-plus"></i>
          <span>Criar projecto</span>
        </a>
      </li><!-- End createProject Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->