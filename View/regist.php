<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pages / Register - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/sweetLogo.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <?php
    if (isset($_GET['passwordValidation'])) {
        $passValidation = "";
    } else {
        $passValidation = "hidden";
    }
    ?>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="../assets/img/sweetLogo.png" alt="">
                                    <span class="d-none d-lg-block">SweetTeam</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Criar uma conta</h5>
                                    </div>

                                    <div class="alert alert-danger text-center alert-dismissible fade show" role="alert"
                                        <?php echo $passValidation; ?>>
                                        Palavra não confirmada, verifica a palavra Passe!
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>

                                    <form class="row g-3 needs-validation" novalidate
                                        action="../Controller/CollaboratorController.php" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Primeiro Nome</label>
                                            <input type="text" name="first_name" class="form-control" id="yourName"
                                                required>
                                            <div class="invalid-feedback">Porfavor, Insira seu Primeiro nome!</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Sobre Nome</label>
                                            <input type="text" name="last_name" class="form-control" id="yourLastName"
                                                required>
                                            <div class="invalid-feedback">Porfavor, Insira seu Sobre nome!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourProfession" class="form-label">Profissão</label>
                                            <input type="text" name="profession" class="form-control"
                                                id="yourProfession" required>
                                            <div class="invalid-feedback">Porfavor, Insira a sua profissão!</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourCountry" class="form-label">País</label>
                                            <select name="country" id="yourCountry" class="form-select"
                                                aria-label="Default select example">
                                                <option selected>Nacionalidade</option>
                                                <option value="África do sul">África do sul</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="Estados Unidos">Estados Unidos</option>
                                                <option value="India">India</option>
                                                <option value="República do Congo">República do Congo</option>
                                            </select>
                                            <div class="invalid-feedback">Porfavor, Insira a sua nacionalidade!</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourPhone" class="form-label">Telefone</label>
                                            <div class="input-group">                                                
                                                <select class="input-group-text col-4" name="country_code" id="yourCountry" class="form-select"
                                                    aria-label="Default select example">
                                                    <option value="+244" selected>+244</option>
                                                    <option value="+33">+33</option>
                                                    <option value="+27">+27</option>
                                                    <option value="+91">+91</option>
                                                    <option value="+55">+55</option>
                                                    <option value="+258">+258</option>                                                    
                                                </select>
                                                <input type="text" class="form-control" name="phone" id="yourPhone"
                                                    aria-describedby="inputGroupPrepend2" required>
                                            </div>
                                            <div class="invalid-feedback">Porfavor, Insira seu Telefone!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">E-mail</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="email" name="email" class="form-control" id="yourEmail"
                                                    required>
                                                <div class="invalid-feedback">Porfavor, Insira seu email!</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Nova Palavra Passe</label>
                                            <input type="password" name="password" class="form-control"
                                                id="yourPassword" required>
                                            <div class="invalid-feedback">Porfavor, crie uma Palavra Passe!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourConfirmPassword" class="form-label">Confirme Palavra
                                                Passe</label>
                                            <input type="password" name="passwordConfirm" class="form-control"
                                                id="yourConfirmPassword" required>
                                            <div class="invalid-feedback">Porfavor, confirme a Palavra Passe!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPhoto" class="form-label">Foto</label>
                                            <input type="file" name="photo" class="form-control" id="yourPhoto"
                                                required>
                                            <div class="invalid-feedback">Porfavor, carregue uma foto!</div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox" value=""
                                                    id="acceptTerms" required>
                                                <label class="form-check-label" for="acceptTerms">Eu concordo e aceito
                                                    os
                                                    <a href="#">termos e condições</a></label>
                                                <div class="invalid-feedback">Tu deves concordar antes de enviar.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Criar Conta</button>
                                        </div>
                                        <div class="col-12 text-center">
                                            <p class="small mb-0">Já tem uma conta? <a href="login.php">Iniciar
                                                    Sessão</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div class="credits">
                                <div class="credits">
                                    Developed by <a href="https://linkedin.com/in/jeremias-dinzingaa9867b221">Jeremias
                                        Dinzinga</a>
                                </div>

                            </div>
                        </div>
                    </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>