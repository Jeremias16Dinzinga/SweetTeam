<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Enviar Mensagem</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!--Calling the header of my Templente-->
  <?php
  require_once 'header.php';
  $crud = new Crud();
  ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Enviar Mensagem</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Mensagem</li>
          <li class="breadcrumb-item active">Escrever</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <!-- Not allowed message when trying to delete a leader -->
    <?php
    if (isset($_GET['errDestin'])) { ?>
      <div class="row">
        <div class="col-1"></div>
        <div class="alert alert-danger alert-dismissible text-center fade show col-10" role="alert">
          Mensagem não envida, Tens que selecionar um destinatário!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
    <?php } ?><!-- End not allowed message -->
    <section class="section">
      <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Escrever Mensagem</h5>

              <!-- Horizontal Form -->
              <form method="POST" action="../Controller/MessageController.php">
                <input type="text" hidden value="<?php echo $_SESSION['id_user']; ?>" name="id_sender">
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Para</label>
                  <div class="col-sm-10">
                    <select class="form-select" id="id_destin" name="id_destin"
                      aria-label="Floating label select example">
                      <option value="0" selected>Selecione destino</option>
                      <?php
                      $allCollaborator = $crud->selectByFieldBD("collaborator", "*", "where id_collaborator != '{$_SESSION['id_user']}'");
                      if ($allCollaborator != false) {
                        foreach ($allCollaborator as $x) {
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

                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Assunto</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" id="title">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Conteúdo</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="content" style="height: 100px"></textarea>
                  </div>
                </div>
                <button type="submit" style="float:right;" class="btn btn-primary"><i class="bi bi-send">
                    Enviar</i></button>
              </form><!-- End Horizontal Form -->

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