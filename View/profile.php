<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Meu Perfil</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!--Calling the header of my Templente-->
    <?php
    require_once 'header.php';

    #Verification if there is a mistake whem changing password
    if (isset($_GET['denied'])) {
        $messageErr = "Não podes alterar a palavra passe, Pavalavra passe actual incorrecto!";
        $messageErrStatus = "";
        $messagesuccessStatus="hidden";

    } elseif (isset($_GET['passwordValidation'])) {
        $messageErr = "Não podes alterar a palavra passe, Nova palavra passe não foi confirmada!";
        $messageErrStatus = "";
        $messagesuccessStatus="hidden";
    } elseif (isset($_GET['success'])) {
        $messageErr = "";
        $messageErrStatus = "hidden";
        $messagesuccessStatus = "";       
    } else {
        $messageErr = "";
        $messageErrStatus = "hidden";
        $messagesuccessStatus = "hidden";
    }

    ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Meu Perfil</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Usuário</li>
                    <li class="breadcrumb-item active">Perfil</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section profile">
            <div class="row">
                <div class="col-xl-4"></div>
                <div class="alert alert-danger text-center alert-dismissible fade show col-xl-8" role="alert" <?php echo $messageErrStatus ?>>
                    <?php echo $messageErr ?>
                    <a href="profile.php"  class="btn-close" data-bs-dismiss="alert" aria-label="Close"></a>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4"></div>
                <div class="alert alert-success text-center alert-dismissible fade show col-xl-8" role="alert" <?php echo $messagesuccessStatus ?>>
                    Palavra passe alterado com sucesso!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="<?php echo $collaborator['photo']; ?>" alt="Profile" class="rounded-circle">
                            <h2>
                                <?php echo $collaborator['first_name'] . " " . $collaborator['last_name']; ?>
                            </h2>
                            <h3>
                                <?php echo $collaborator['profession']; ?>
                            </h3>
                            <?php ?>
                            <div class="social-links mt-2">
                                <a href="<?php echo $collaborator['twitterUrl']; ?>" class="twitter"><i
                                        class="bi bi-twitter"></i></a>
                                <a href="<?php echo $collaborator['githubUrl']; ?>" class="github"><i
                                        class="bi bi-github"></i></a>
                                <a href="<?php echo $collaborator['linkedinUrl']; ?>" class="linkedin"><i
                                        class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Geral</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar
                                        Perfil</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Alterar Palavra Passe</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">Sobre</h5>
                                    <p class="small fst-italic">
                                        <?php echo $collaborator['resume']; ?>
                                    </p>

                                    <h5 class="card-title">Perfil</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Nome</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $collaborator['first_name'] . " " . $collaborator['last_name']; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Profissão</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $collaborator['profession']; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">País</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $collaborator['country']; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Telefone</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $collaborator['phone']; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $collaborator['email']; ?>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form action="../Controller/CollaboratorController.php" method="POST"
                                        enctype="multipart/form-data">

                                        <input name="id_collaborator" type="hidden" id="id_collaborator"
                                            value="<?php echo $collaborator['id_collaborator'] ?>">
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Imagem do
                                                Perfil</label>
                                            <div class="col-md-8 col-lg-9">
                                                <img src="<?php echo $collaborator['photo'] ?>" alt="Profile">
                                                <div class="pt-2">
                                                    <input name="photo" style="margin-left:10px;" class="col-3"
                                                        type="file" id="photo"
                                                        value="<?php echo $collaborator['photo'] ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="FirstName" class="col-md-4 col-lg-3 col-form-label">Primeiro
                                                Nome</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="first_name" type="text" class="form-control" id="FirstName"
                                                    value="<?php echo $collaborator['first_name'] ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="LasName" class="col-md-4 col-lg-3 col-form-label">Sobre
                                                Nome</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="last_name" type="text" class="form-control" id="LastName"
                                                    value="<?php echo $collaborator['last_name'] ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Resume" class="col-md-4 col-lg-3 col-form-label">Sobre</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea name="resume" class="form-control" id="Resume"
                                                    style="height: 90px"><?php echo $collaborator['resume'] ?></textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Profession"
                                                class="col-md-4 col-lg-3 col-form-label">Profissão</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="profession" type="text" class="form-control" id="Prfession"
                                                    value="<?php echo $collaborator['profession'] ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">País</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="country" type="text" class="form-control" id="Country"
                                                    value="<?php echo $collaborator['country'] ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Telefone</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="phone" type="text" class="form-control" id="Phone"
                                                    value="<?php echo $collaborator['phone'] ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email" class="form-control" id="Email"
                                                    value="<?php echo $collaborator['email'] ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter
                                                URL</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="twitterUrl" type="text" class="form-control" id="Twitter"
                                                    value="<?php echo $collaborator['twitterUrl'] ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Github" class="col-md-4 col-lg-3 col-form-label">Github
                                                URL</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="githubUrl" type="text" class="form-control" id="github"
                                                    value="<?php echo $collaborator['githubUrl'] ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="LinkedinUlr" class="col-md-4 col-lg-3 col-form-label">Linkedin
                                                URL</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="linkedinUrl" type="text" class="form-control"
                                                    id="linkedinUrl" value="<?php echo $collaborator['linkedinUrl'] ?>">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Salvar Mudanças</button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form action="../Controller/CollaboratorController.php" method="POST"
                                        enctype="multipart/form-data">

                                        <input name="id_collaborator" type="hidden" id="id_collaborator"
                                            value="<?php echo $collaborator['id_collaborator'] ?>">

                                        <div class="row mb-3">
                                            <label for="currentPassword"
                                                class="col-md-4 col-lg-3 col-form-label">Palavra Passe actual</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="current_password" type="password" class="form-control"
                                                    id="currentPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nova
                                                Palavra Passe</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="new_password" type="password" class="form-control"
                                                    id="newPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="confirmPassword"
                                                class="col-md-4 col-lg-3 col-form-label">Confirmar
                                                Palavra Passe</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="confirm_password" type="password" class="form-control"
                                                    id="ConfirmPassword">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Salvar Mudanças</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!--Calling the footer of my Templente-->
    <?php
    require_once 'footer.php';
    ?>

    </body>

</html>