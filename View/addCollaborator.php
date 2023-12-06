<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Adicionar Colaborador</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!--Calling the header of my Templente-->
    <?php
    require_once 'header.php';
    $crud = new Crud();
    ?>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Colaboradores de
                <?php echo ($crud->selectBD("project", "description", "where id_project = '{$_GET['id']}'")["description"]); ?>
            </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Projecto</li>
                    <li class="breadcrumb-item active">Colaborador</li>
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
                            <h6 class="card-title">Colaboradores</h6>

                            <!-- Table of collaborator -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Profissão</th>
                                        <th scope="col">Telefone</th>
                                        <th scope="col">Perfil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $my_collaboratorIds = $crud->selectByFieldBD("project_collaborator", "id_collaborator", "where id_project = '{$_GET['id']}'");   //Get all the ID collaborator of this project                                              
                                    foreach ($my_collaboratorIds as $x) {
                                        $item = $crud->selectBD("collaborator", "*", "where id_collaborator = '{$x['id_collaborator']}'");
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo ($item['first_name'] . " " . $item['last_name']); ?>
                                            </td>
                                            <td>
                                                <?php echo ($item['profession']); ?>
                                            </td>
                                            <td>
                                                <?php echo ($item['phone']); ?>
                                            </td>
                                            <td>
                                                <img src="<?php echo ($item['photo']); ?>" width="45px" height="45px"
                                                    alt="Profile" class="rounded-circle">
                                            </td>
                                            <td>
                                                <a href="../controller/CollaboratorController.php?remove_collaborator_to_project=<?php echo $item["id_collaborator"] ?>&&this_project=<?php echo $_GET['id'] ?>"
                                                    class="btn btn-danger"><i class="bi bi-dash-circle"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <!-- End Table of collaborator-->

                        </div>
                    </div>
                </div>
            </div>

            <!-- Successfull message after adding a collaborator -->
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

            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-sm-10">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Adicionar Colaborador</h6>
                            <!-- Horizontal Form -->
                            <form class="search-bar" method="POST" action="#">
                                <input type="text" name="query" class="col-11" placeholder="Pesquisar"
                                    title="Enter search keyword">
                                <button type="submit" title="Search" class="btn btn-primary mb-1 pb-1 pt-1"><i
                                        class="bi bi-search"></i></button>
                            </form>

                            <!-- End Horizontal Form -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $crud = new Crud();

                                    // Check if a search query is submitted
                                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["query"])) {
                                        // Sanitize and use the query to filter collaborator IDs
                                        $search_query = filter_input(INPUT_POST, "query", FILTER_SANITIZE_STRING);
                                        $all_collaboratorIds = $crud->selectByFieldBD("collaborator", "id_collaborator", "WHERE first_name LIKE '%$search_query%' OR last_name LIKE '%$search_query%'");
                                    } else {
                                        // If no search query, get all collaborator IDs in the system
                                        $all_collaboratorIds = $crud->selectByFieldBD("collaborator", "id_collaborator", "");
                                    }

                                    // Get all the ID collaborators of the specified project
                                    $my_collaboratorIds = $crud->selectByFieldBD("project_collaborator", "id_collaborator", "where id_project = '{$_GET['id']}'");

                                    // Initialize an array to store IDs of collaborators not associated with the project
                                    $another_collaboratorIds = array();

                                    // Check each collaborator ID in the system
                                    foreach ($all_collaboratorIds as $all) {
                                        $found = false;

                                        // Check if the collaborator ID is already associated with the project
                                        foreach ($my_collaboratorIds as $my) {
                                            if ($all["id_collaborator"] == $my["id_collaborator"]) {
                                                $found = true;
                                                break;
                                            }
                                        }

                                        // If the collaborator ID is not associated with the project, add it to the array
                                        if (!$found) {
                                            $another_collaboratorIds[] = $all;
                                        }
                                    }
                                    // Now, $another_collaboratorIds contains IDs of collaborators not associated with the project                                    
                                    foreach ($another_collaboratorIds as $x) {
                                        $item = $crud->selectBD("collaborator", "*", "where id_collaborator = '{$x['id_collaborator']}'");
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo ($item['first_name'] . " " . $item['last_name']); ?>
                                            </td>
                                            <td>
                                                <?php echo $item['profession']; ?>
                                            </td>
                                            <td>
                                                <?php echo ($item['phone']); ?>
                                            </td>
                                            <td>
                                                <img src="<?php echo ($item['photo']); ?>" width="45px" height="45px"
                                                    alt="Profile" class="rounded-circle">
                                            </td>
                                            <td>
                                                <a href="../controller/CollaboratorController.php?add_collaborator_to_project=<?php echo $item['id_collaborator'] ?>&&this_project=<?php echo $_GET['id'] ?>"
                                                    class="btn btn-success"><i class="bi bi-plus-circle"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

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