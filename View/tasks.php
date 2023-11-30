<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tarefas</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

 <!--Calling the header of my Templente-->
 <?php
    require_once 'header.php';
  ?>
 
 <main id="main" class="main">

  <div class="pagetitle">
    <h1>Minhas Tarefas</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Tarefas</li>
        <li class="breadcrumb-item active">Todas</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
    <div class="col-lg-6">
        <div class="card">
          <div class="card-header text-center">Projecto</div>
            <div class="card-body">   
              <!-- Start of project content -->
              <br/>              
              <div class="alert alert-warning alert-dismissible fade show" role="alert">              
                  <h4 class="alert-heading"><i class="bi bi-clock-history me-1"></i> Tarefa</h4>
                  <p style="text-align:justify">Desenvolvimento Profissional: Acredito que o conhecimento em desenvolvimento back-end é fundamental para construir sistemas e aplicativos robustos e eficientes. Este curso me proporcionará as habilidades técnicas necessárias para atingir esse objetivo e me tornar um desenvolvedor altamente qualificado.</p>
                  <hr>
                  <p class="mb-0"><span class="text-secondary"> Prazo: 24-11-2023 </span><i class="bi bi-alarm-fill text-secondary"></i></p>              
              </div>              
              <div class="d-grid gap-2 mt-3">
                  <button type="button" class="btn btn-outline-success"><i class="bi bi-clipboard-check "></i><span> Marcar como concluido</span></button>
              </div>
              <!-- End of project content -->
          </div>
          <div class="card-footer">
              13/11/2023 - 22h:39Min <i class="bi bi-clock "></i>
          </div>
       </div>
      </div>

      <div class="col-lg-6">
        <div class="card">
          <div class="card-header text-center">Projecto</div>
            <div class="card-body">   
              <!-- Start of project content -->
              <br/>              
              <div class="alert alert-success alert-dismissible fade show" role="alert">              
                  <h4 class="alert-heading"><i class="bi bi-check-circle me-1"></i> Tarefa</h4>
                  <p style="text-align:justify">Desenvolvimento Profissional: Acredito que o conhecimento em desenvolvimento back-end é fundamental para construir sistemas e aplicativos robustos e eficientes. Este curso me proporcionará as habilidades técnicas necessárias para atingir esse objetivo e me tornar um desenvolvedor altamente qualificado.</p>
                  <hr>
                  <p class="mb-0"><span class="text-secondary"> Prazo: 24-11-2023 </span><i class="bi bi-alarm-fill text-secondary"></i></p>              
              </div>              
              <div class="d-grid gap-2 mt-3">
                  <button type="button" class="btn btn-outline-danger"><i class="bi bi-clipboard-x "></i><span> Dismarcar como concluido</span></button>
              </div>
              <!-- End of project content -->
          </div>
          <div class="card-footer">
              13/11/2023 - 22h:39Min <i class="bi bi-clock "></i>
          </div>
       </div>
      </div>

      <div class="col-lg-6">
        <div class="card">
          <div class="card-header text-center">Projecto</div>
            <div class="card-body">   
              <!-- Start of project content -->
              <br/>              
              <div class="alert alert-danger alert-dismissible fade show" role="alert">              
                  <h4 class="alert-heading"><i class="ri-alarm-warning-line me-1"></i> Tarefa</h4>
                  <p style="text-align:justify">Desenvolvimento Profissional: Acredito que o conhecimento em desenvolvimento back-end é fundamental para construir sistemas e aplicativos robustos e eficientes. Este curso me proporcionará as habilidades técnicas necessárias para atingir esse objetivo e me tornar um desenvolvedor altamente qualificado.</p>
                  <hr>
                  <p class="mb-0"><span class="text-secondary"> Prazo: 24-11-2023 </span><i class="bi bi-alarm-fill text-secondary"></i></p>              
              </div>              
              <div class="d-grid gap-2 mt-3">
                  <button type="button" class="btn btn-outline-success"><i class="bi bi-clipboard-check "></i><span> Marcar como concluido</span></button>
              </div>
              <!-- End of project content -->
          </div>
          <div class="card-footer">
              13/11/2023 - 22h:39Min <i class="bi bi-clock "></i>
          </div>
       </div>
      </div>

      <div class="col-lg-6">
        <div class="card">
          <div class="card-header text-center">Projecto</div>
            <div class="card-body">   
              <!-- Start of project content -->
              <br/>              
              <div class="alert alert-success alert-dismissible fade show" role="alert">              
                  <h4 class="alert-heading"><i class="bi bi-check-circle me-1"></i> Tarefa</h4>
                  <p style="text-align:justify">Desenvolvimento Profissional: Acredito que o conhecimento em desenvolvimento back-end é fundamental para construir sistemas e aplicativos robustos e eficientes. Este curso me proporcionará as habilidades técnicas necessárias para atingir esse objetivo e me tornar um desenvolvedor altamente qualificado.</p>
                  <hr>
                  <p class="mb-0"><span class="text-secondary"> Prazo: 24-11-2023 </span><i class="bi bi-alarm-fill text-secondary"></i></p>              
              </div>              
              <div class="d-grid gap-2 mt-3">
              <button type="button" class="btn btn-outline-danger"><i class="bi bi-clipboard-x "></i><span> Dismarcar como concluido</span></button>
              </div>
              <!-- End of project content -->
          </div>
          <div class="card-footer">
              13/11/2023 - 22h:39Min <i class="bi bi-clock "></i>
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