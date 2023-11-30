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

  <section class="section">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">

            <div class="card">
            <div class="card-body">
            <h5 class="card-title">Escrever Mensagem</h5>

                <!-- Horizontal Form -->
            <form>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Para</label>
                    <div class="col-sm-10">            
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>Selecione destino</option>
                            <option value="1">Kaleb Dinzinga</option>
                            <option value="2">Jemima Dinzinga</option>
                            <option value="3">Ezequiel Dinzinga</option>
                        </select>
                    </div>
                </div>    
            
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Assunto</label>
                    <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail">
                    </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Conteúdo</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px"></textarea>
                  </div>
                </div>
                <button type="submit" style="float:right;" class="btn btn-primary"><i class="bi bi-send"> Enviar</i></button>
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