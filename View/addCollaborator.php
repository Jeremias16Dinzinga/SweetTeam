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
                                                <a href="../controller/CollaboratorController.php?remove_collaborator_to_project=<?php echo $item['id_collaborator'] ?>&&this_project=<?php echo $_GET['id'] ?>"
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
                                    $my_collaboratorIds = $crud->selectByFieldBD("project_collaborator", "id_collaborator", "where id_project = '{$_GET['id']}'");   //Get all the ID collaborator of this project                                              
                                    $all_collaboratorIds = $crud->selectByFieldBD("collaborator", "id_collaborator", "");   //all the collaborator in system                                                                               
                                    
                                    //Get all the another ID collaborator to add in this project
                                    foreach ($all_collaboratorIds as $all) {
                                        foreach ($my_collaboratorIds as $my) {
                                            if ($all["id_collaborator"] != $my["id_collaborator"]) {
                                                $another_collaboratorIds[] = $all;
                                            }
                                        }
                                    }

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


            <!-- Basic Modal -->
            <div class="modal fade" id="CancelModel" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Cancelar Projecto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Realmente pretendes cancelar o projecto, se cancelares não poderás contribuir para o
                            projecto.
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