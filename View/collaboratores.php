<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Colaboradores</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!--Calling the header of my Templente-->
    <?php
    require_once 'header.php';
    $crud = new Crud();
    $shared_collaboratorIds = array();
    $shared_collaboratores = array();
    $t;
    $test;

    //Get all the ID projects I'm in
    $my_projectsIds = $crud->selectByFieldBD("project_collaborator", "id_project", "where id_collaborator = '{$_SESSION['id_user']}'");

    #Get all the ID collaborator who we are sharing project
    foreach ($my_projectsIds as $my_project_id) {
        $t = $crud->selectBD("project_collaborator", "id_collaborator", "where id_project = '{$my_project_id['id_project']}' and id_collaborator != '{$_SESSION['id_user']}'");
        $found = false;        
        foreach ($shared_collaboratorIds as $oneSharedId) {
            if ($t == $oneSharedId)
                $found = true;
            break;
        }
        if ($found == false)
            $shared_collaboratorIds[] = $t;
    }

    #Getting all shered collaboratores
    foreach ($shared_collaboratorIds as $x) {
        $shared_collaboratores[] = $crud->selectBD("collaborator", "*", "where id_collaborator = '{$x['id_collaborator']}'");
    }

    #Choosing target to show collaboratores
    function target($crud, $shared_collaboratores)
    {
        if ($_GET['target'] == "shared") {
            return $shared_collaboratores;
        } else {
            return $crud->selectByfieldBD("collaborator", "*", "where id_collaborator != '{$_SESSION['id_user']}'");
        }
    }

    ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Colaboradores</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Colaborador</li>
                    <li class="breadcrumb-item active">Disponivel</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <?php

                $collaboratores = target($crud, $shared_collaboratores);
                if ($collaboratores != null) {
                    foreach ($collaboratores as $item) {
                        $count_shared = 0;                        
                        if ($item == false) {
                            break;
                        }

                        #Counting the shared project                        
                        foreach ($my_projectsIds as $my_project_id) {
                            $y = $crud->selectBD("project_collaborator", "count(*)", "where id_project = '{$my_project_id['id_project']}' and id_collaborator = '{$item['id_collaborator']}'");

                            if ($y["count(*)"] == 1)
                                $count_shared++;

                        }


                        ?>
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                    <img src="<?php echo $item['photo']; ?>" alt="Profile" class="rounded-circle"
                                        style="width: 100px; height: 100px;">
                                    <hr />
                                    <h4>
                                        <?php echo $item['first_name'] . " " . $item['last_name']; ?>
                                    </h4>
                                    <h6 class="text-secondary">
                                        <?php echo $item['profession']; ?>
                                    </h6>
                                    <hr>
                                    <h6 class="text-secondary">E-mail:
                                        <?php echo $item['email']; ?>
                                    </h6>
                                    <h6 class="text-secondary">Telefon:
                                        <?php echo $item['phone']; ?>
                                    </h6>
                                    <button type="button" class="btn btn-outline-secondary"><i
                                            class="ri-contacts-line "></i><span> Projecto Partilhado (
                                            <?php echo $count_shared ?>)
                                        </span></button>
                                    <div class="social-links mt-4">
                                        <a href="<?php echo $item['twitterUrl']; ?>"
                                            class="twitter btn btn-outline-secondary"><i class="bi bi-twitter"></i></a>
                                        <a href="<?php echo $item['githubUrl']; ?>" class="github btn btn-outline-secondary"><i
                                                class="bi bi-github"></i></a>
                                        <a href="<?php echo $item['linkedinUrl']; ?>"
                                            class="linkedin btn btn-outline-secondary"><i class="bi bi-linkedin"></i></a>
                                    </div>
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