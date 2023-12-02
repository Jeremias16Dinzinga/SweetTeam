<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Criar Projecto</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!--Calling the header of my Templente-->
  <?php
  require_once 'header.php';
  ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Criar Projecto</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Projecto</li>
          <li class="breadcrumb-item active">Novo</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Novo Projecto</h5>

              <!-- Horizontal Form -->
              <form method="Post" action="../Controller/ProjectController.php">
                <input type="text" hidden class="form-control" value="<?php echo$_SESSION['id_user'];?>" name="id_leader">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Descrição</label>
                  <div class="col-sm-5">
                    <input type="text" name="description" class="form-control">
                  </div>

                  <div class="col-sm-5">
                    <input type="date" name="deadline" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Scopo</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="scope" style="height: 100px"></textarea>
                  </div>
                </div>                

                <button type="submit" style="float:right;" class="btn btn-primary"><i class="bi bi-arrow-right-circle">
                    Salvar</i></button><br /><br />
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