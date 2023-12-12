<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Adicionar Tarefas</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!--Calling the header of my Templente-->
    <?php
    require_once 'header.php';
    $crud = new Crud();
    $my_collaboratorIds = $crud->selectByFieldBD("project_collaborator", "id_collaborator", "where id_project = '{$_GET['id_project']}'");   //Get all the ID collaborator of this project     
    #verification if is update action or insert action
    if (isset($_GET['update_id_task'])) {
        $task_item = $crud->selectBD("task", "*", "where id_task = '{$_GET['update_id_task']}'");
        $task_collaborator = $crud->selectBD("collaborator", "*", "where id_collaborator = '{$task['id_collaborator']}'");
        $select_text = $task_collaborator['first_name'] . " " . $task_collaborator['last_name'];
        $box_title = "Actualizar Tarefa";
        $btn_text = "Actualizar";
        $btn_style = "bi bi-arrow-right-circle";
    } else {
        $task_item['id_task'] = "";
        $task_item['description'] = "";
        $task_item['resume'] = "";
        $task_item['deadline'] = "";
        $task_item['id_collaborator'] = "";
        $task_item['id_project'] = "";
        $task_item['create_date'] = "";
        $task_item['status'] = "";
        $task_item['update_date'] = "";
        $select_text = "Selecione colaborador";
        $box_title = "Adicionar Tarefa";
        $btn_text = "Adicionar";
        $btn_style = "bi bi-plus-circle";
    }
    ?>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Tarefas do projecto
                <?php echo ($crud->selectBD("project", "description", "where id_project = '{$_GET['id_project']}'")["description"]); ?>
            </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Projecto</li>
                    <li class="breadcrumb-item active">Tarefas</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <!-- Not allowed message when trying to delete a leader -->
        <?php
        if (isset($_GET['notAllowed'])) { ?>
            <div class="row">
                <div class="col-1"></div>
                <div class="alert alert-danger alert-dismissible text-center fade show col-10" role="alert">
                    Não é possível excluir o responsável do projecto!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        <?php } ?><!-- End not allowed message -->

        <section class="section">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-sm-10">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">
                                <?php echo $box_title ?>
                            </h6>

                            <!-- add task -->
                            <!-- Horizontal Form -->
                            <form method="Post" action="../Controller/TaskController.php">
                                <input type="text" hidden value="<?php echo $task_item['id_task']; ?>" name="id_task">
                                <div class="row mb-3">
                                    <input type="text" hidden class="form-control"
                                        value="<?php echo $_GET['id_project']; ?>" name="id_project">
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Tarefa</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="description"
                                                value="<?php echo $task_item['description'] ?>" class="form-control">
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="col-sm-10">
                                                <select name="id_collaborator" id="id_collaborator" class="form-select"
                                                    aria-label="Default select example">
                                                    <option selected
                                                        value="<?php echo $task_collaborator['id_collaborator'] ?>">
                                                        <?php echo $select_text ?>
                                                    </option>
                                                    <?php
                                                    foreach ($my_collaboratorIds as $collaborator) {
                                                        $x = $crud->selectBD("collaborator", "*", "where id_collaborator = '{$collaborator['id_collaborator']}' and id_collaborator != '{$task_collaborator['id_collaborator']}'");                                                        
                                                        if ($x != false) {
                                                            ?>
                                                            <option value="<?php echo $x['id_collaborator']; ?>">
                                                                <?php echo $x['first_name'] . " " . $x['last_name']; ?>
                                                            </option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Descrição</label>
                                        <div class="col-sm-9">
                                            <textarea name="resume" class="form-control" id="Resume"
                                                style="height: 80px"><?php echo $task_item['resume'] ?></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputDeadline" class="col-sm-2 col-form-label">Prazo</label>
                                        <div class="col-sm-5">
                                            <input type="date" id="inputDeadline"
                                                value="<?php echo $task_item['deadline'] ?>" name="deadline"
                                                class="form-control">
                                        </div>
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-3">
                                            <button type="submit" class="btn btn-primary "><i
                                                    class="<?php echo $btn_style ?>">
                                                    <?php echo $btn_text ?>
                                                </i></button><br /><br />
                                        </div>
                                    </div>

                            </form><!-- End Horizontal Form -->

                            <!-- End of add task -->

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-sm-10">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Tarefas</h6>

                            <!-- Table of task -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Tarefa</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Colaborador</th>
                                        <th scope="col">Prazo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $all_tasks = $crud->selectByFieldBD("task", "*", "where id_project = '{$_GET['id_project']}'");   //Get all the task of this project                                              
                                    foreach ($all_tasks as $item) {
                                        $collaborator = $crud->selectBD("collaborator", "*", "where id_collaborator = '{$item['id_collaborator']}'");   //Get the collaborator of this project                                                                                                                           
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo ($item['description']); ?>
                                            </td>
                                            <td>
                                                <?php echo ($item['status']); ?>
                                            </td>
                                            <td>

                                                <?php echo ($collaborator['first_name'] . " " . $collaborator['last_name']); ?>
                                            </td>
                                            <td>
                                                <?php echo ($item['deadline']); ?>
                                            </td>
                                            <td>
                                                <a href="addTask.php?id_project=<?php echo $item['id_project'] ?>&&update_id_task=<?php echo $item['id_task'] ?>"
                                                    class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <!-- End Table of task-->

                        </div>
                    </div>
                </div>
            </div>


            <!-- Successfull message after adding a task -->
            <?php
            if (isset($_GET['success'])) { ?>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="alert alert-success alert-dismissible text-center fade show col-10" role="alert">
                        Colaborador adicionado ao projecto!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php } ?><!-- End successfull message -->

            <!-- Modal for Deleting collaborator -->
            <div class="modal fade" id="deleteCollaboratorModel" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Excluir colaborador do Projecto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Realmente pretendes excluir o colaborador do projecto? Se exluires Ele já não poderá
                            contribuir no projecto.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não</button>
                            <button type="submit" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#deleteCollaboratorModel"> Sim</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal-->

        </section>
    </main><!-- End #main -->

    <!--Calling the footer of my Templente-->
    <?php
    require_once 'footer.php';
    ?>

    </body>

</html>