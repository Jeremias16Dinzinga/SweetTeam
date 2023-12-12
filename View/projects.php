<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Meus projectos</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!--Calling the header of my Templente-->
  <?php
  require_once 'header.php';

  //Choosing target to show projects
  function target($x, $crud)
  {
    if ($_GET['target'] == "all") {
      return $projects = $crud->selectBD("project", "*", "where id_project = '{$x["id_project"]}'");
    } elseif ($_GET['target'] == "pending") {
      return $projects = $crud->selectBD("project", "*", "where id_project = '{$x["id_project"]}' and status = 'Pendente'");
    } elseif ($_GET['target'] == "achived") {
      return $projects = $crud->selectBD("project", "*", "where id_project = '{$x["id_project"]}' and status = 'Concluido'");
    } else {
      return $projects = $crud->selectBD("project", "*", "where id_project = '{$x["id_project"]}' and status = 'Cancelado'");
    }
  }

  ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Meus Projectos</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Projectos </li>
          <li class="breadcrumb-item active">Todos</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <?php
        $crud = new Crud();

        $my_projectsIds = $crud->selectByFieldBD("project_collaborator", "id_project", "where id_collaborator = '{$_SESSION['id_user']}'");   //Get all the ID projects I'm in                                       
        
        if ($my_projectsIds != null) {
          foreach ($my_projectsIds as $x) {

            $item = target($x, $crud);

            if ($item == null || $item == "")
              break;

            $leader = $crud->selectBD("collaborator", "*", "where id_collaborator = '{$item['id_leader']}'");
            $count_task = $crud->selectBD("task", "count(*)", "where id_project = '{$item['id_project']}'");

            ?>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <?php echo $item['description']; ?>
                </div>
                <div class="card-body">
                  <!-- Start of project content -->
                  <br />
                  <span class="text-secondary"> Prazo:
                    <?php echo $item['deadline']; ?>
                  </span><i class="bi bi-alarm-fill text-secondary"></i>
                  <br />
                  <div <?php if ($item['status'] != 'Cancelado')
                    echo ('hidden') ?>>
                      <span class="text-secondary"> Estado: </span> <span class="badge bg-danger"><i
                          class="bi bi-exclamation-octagon me-1"></i>
                      <?php echo $item['status']; ?>
                    </span>
                  </div>

                  <div <?php if ($item['status'] != 'Concluido')
                    echo ('hidden') ?>>
                      <span class="text-secondary"> Estado: </span><span class="badge bg-success"><i
                          class="bi bi-check-circle me-1"></i>
                      <?php echo $item['status']; ?>
                    </span>
                  </div>
                  <div <?php if ($item['status'] != 'Pendente')
                    echo ('hidden') ?>>
                      <span class="text-secondary"> Estado: </span></span><span class="badge bg-warning text-dark"><i
                          class="ri-history-line me-1"></i>
                      <?php echo $item['status']; ?>
                    </span>
                  </div>
                  <span class="text-secondary"> Resposnsável:
                    <?php echo ($leader['first_name'] . " " . $leader['last_name']); ?>
                  </span> <br /><br />
                  <a href="addTask.php?id_project=<?php echo $item['id_project'] ?>" class="btn btn-primary"><i
                      class="bi bi-journal-text"></i><span>
                      Tarefas(
                      <?php echo $count_task['count(*)']; ?>)
                    </span></a>
                  <a href="addCollaborator.php?id_project=<?php echo $item['id_project'] ?>" class="btn btn-success"><i
                      class="ri-team-line"></i><span> Colaboradores</span></a>
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#CancelModel"> <i
                      class="ri-close-circle-line"></i><span> Cancelar</span></button>
                  <div class="d-grid gap-2 mt-3">
                    <a href="addCollaborator.php?id_project=<?php echo $item['id_project'] ?>" class="btn btn-secondary"><i
                        class="bi bi-eye "></i><span> Mais
                        Detalhes</span></a>
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

        <!-- Basic Modal -->
        <div class="modal fade" id="CancelModel" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Cancelar Projecto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Realmente pretendes cancelar o projecto, se cancelares não poderás contribuir para o projecto.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não</button>
                <button type="button" class="btn btn-success">Sim</button>
              </div>
            </div>
          </div>
        </div>
        <!-- End Basic Modal-->
    </section>

  </main><!-- End #main -->

  <!--Calling the footer of my Templente-->
  <?php
  require_once 'footer.php';
  ?>

  </body>

</html>