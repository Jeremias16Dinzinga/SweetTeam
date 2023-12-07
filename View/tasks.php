<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tarefas</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!--Calling the header of my Templente-->
  <?php
  require_once 'header.php';

  $crud = new Crud();

  //Choosing target to show tasks
  if ($_GET['target'] == "all") {
    $my_tasks = $crud->selectByFieldBD("task", "*", "where id_collaborator = '{$_SESSION['id_user']}'");
  } elseif ($_GET['target'] == "pending") {
    $my_tasks = $crud->selectByFieldBD("task", "*", "where id_collaborator = '{$_SESSION['id_user']}' and status = 'Pendente'");
  } elseif ($_GET['target'] == "achived") {
    $my_tasks = $crud->selectByFieldBD("task", "*", "where id_collaborator = '{$_SESSION['id_user']}' and status = 'Concluido'");
  } else {
    $my_tasks = $crud->selectByFieldBD("task", "*", "where id_collaborator = '{$_SESSION['id_user']}' and status = 'Atrazado'");
  }

  ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Minhas Tarefas</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tarefas</li>
          <li class="breadcrumb-item active">Todas</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <?php

        if ($my_tasks != null) {
          foreach ($my_tasks as $item) {

            if ($item == null || $item == "")
              break;

            $project = $crud->selectBD("project", "*", "where id_project = '{$item['id_project']}'");

            if ($item['status'] == "Atrazado") {
              $cardColor = "alert alert-danger alert-dismissible fade show";
              $taskIcon = "ri-alarm-warning-line me-1";
              $buttonIcon = "bi bi-clipboard-check";
              $buttonColor = "btn btn-outline-success";
              $buttonText = "Marcar como concluido";

            } elseif ($item['status'] == "Concluido") {
              $cardColor = "alert alert-success alert-dismissible fade show";
              $taskIcon = "bi bi-check-circle me-1";
              $buttonIcon = "bi bi-clipboard-x";
              $buttonColor = "btn btn-outline-danger";
              $buttonText = "Dismarcar como concluido";

            } else {
              $cardColor = "alert alert-warning alert-dismissible fade show";
              $taskIcon = "bi bi-clock-history me-1";
              $buttonIcon = "bi bi-clipboard-check";
              $buttonColor = "btn btn-outline-success";
              $buttonText = "Marcar como concluido";

            }
            ?>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header text-center">
                  <?php echo $project['description']; ?>
                </div>
                <div class="card-body">
                  <!-- Start of project content -->
                  <br />
                  <div class="<?php echo $cardColor; ?>" role="alert">
                    <h4 class="alert-heading"><i class="<?php echo $taskIcon; ?>"></i>
                      <?php echo $item['description']; ?>
                    </h4>
                    <p style="text-align:justify">Desenvolvimento Profissional: Acredito que o conhecimento em
                      desenvolvimento back-end é fundamental para construir sistemas e aplicativos robustos e eficientes.
                      Este curso me proporcionará as habilidades técnicas necessárias para atingir esse objetivo e me tornar
                      um desenvolvedor altamente qualificado.</p>
                    <hr>
                    <p class="mb-0"><span class="text-secondary"> Prazo:
                        <?php echo $item['deadline']; ?>
                      </span><i class="bi bi-alarm-fill text-secondary"></i></p>
                  </div>
                  <div class="d-grid gap-2 mt-3">
                    <button type="button" class="<?php echo $buttonColor; ?>"><i class="<?php echo $buttonIcon; ?>"></i><span>
                    <?php echo $buttonText; ?></span></button>
                  </div>
                  <!-- End of project content -->
                </div>
                <div class="card-footer">
                  <?php echo $item['create_date']; ?> <i class="bi bi-clock "></i>
                </div>
              </div>
            </div>
            <?php
          }
        }
        ?>

      </div>
    </section>
  </main><!-- End #main -->

  <!--Calling the footer of my Templente-->
  <?php
  require_once 'footer.php';
  ?>

  </body>

</html>