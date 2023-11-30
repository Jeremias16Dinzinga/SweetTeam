<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Meus projectos</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!--Calling the header of my Templente-->
 <?php
    require_once 'header.php';
  ?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Meus Projectos</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Projectos </li>
      <li class="breadcrumb-item active">Todos</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header">Nome do projecto</div>
        <div class="card-body">   
            <!-- Start of project content -->
            <br/>
            <span class="text-secondary"> Prazo: 24-12-2023 </span><i class="bi bi-alarm-fill text-secondary"></i> <br/>
            <span class="text-secondary"> Estado: </span> <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Cancelado</span> <br/>
            <span class="text-secondary"> Resposnsável: Kaleb Dinzinga</span> <br/><br/>
            <button type="button" class="btn btn-primary"><i class="bi bi-journal-text"></i><span> Tarefas(14)</span></button>
            <button type="button" class="btn btn-success"><i class="ri-team-line"></i><span> Colaboradores</span></button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#CancelModel"> <i class="ri-close-circle-line"></i><span> Cancelar</span></button>
            <div class="d-grid gap-2 mt-3">
                <button type="button" class="btn btn-secondary"><i class="bi bi-eye "></i><span> Mais Detalhes</span></button>
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
        <div class="card-header">Nome do projecto</div>
        <div class="card-body">   
            <!-- Start of project content -->
            <br/>
            <span class="text-secondary"> Prazo: 24-12-2023 </span><i class="bi bi-alarm-fill text-secondary"></i> <br/>
            <span class="text-secondary"> Estado: </span><span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Concluido</span> <br/>
            <span class="text-secondary"> Resposnsável: Kaleb Dinzinga</span> <br/><br/>
            <button type="button" class="btn btn-primary"><i class="bi bi-journal-text"></i><span> Tarefas(10)</span></button>
            <button type="button" class="btn btn-success"><i class="ri-team-line"></i><span> Colaboradores</span></button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#CancelModel"> <i class="ri-close-circle-line"></i><span> Cancelar</span></button>
            <div class="d-grid gap-2 mt-3">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#CancelModel"><i class="bi bi-eye "></i><span> Mais Detalhes</span></button>
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
        <div class="card-header">Nome do projecto</div>
        <div class="card-body">   
            <!-- Start of project content -->
            <br/>
            <span class="text-secondary"> Prazo: 24-12-2023 </span><i class="bi bi-alarm-fill text-secondary"></i> <br/>
            <span class="text-secondary"> Estado: </span><span class="badge bg-warning text-dark"><i class="ri-history-line me-1"></i> Pendente</span><br/>
            <span class="text-secondary"> Resposnsável: Kaleb Dinzinga</span> <br/><br/>
            <button type="button" class="btn btn-primary"><i class="bi bi-journal-text"></i><span> Tarefas(5)</span></button>
            <button type="button" class="btn btn-success"><i class="ri-team-line"></i><span> Colaboradores</span></button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#CancelModel"> <i class="ri-close-circle-line"></i><span> Cancelar</span></button>
            <div class="d-grid gap-2 mt-3">
                <button type="button" class="btn btn-secondary"><i class="bi bi-eye "></i><span> Mais Detalhes</span></button>
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
        <div class="card-header">Nome do projecto</div>
        <div class="card-body">   
            <!-- Start of project content -->
            <br/>
            <span class="text-secondary"> Prazo: 24-12-2023 </span><i class="bi bi-alarm-fill text-secondary"></i> <br/>
            <span class="text-secondary"> Estado: </span></span><span class="badge bg-warning text-dark"><i class="ri-history-line me-1"></i> Pendente</span> <br/>
            <span class="text-secondary"> Resposnsável: Kaleb Dinzinga</span> <br/><br/>
            <button type="button" class="btn btn-primary"><i class="bi bi-journal-text"></i><span> Tarefas(6)</span></button>
            <button type="button" class="btn btn-success"><i class="ri-team-line"></i><span> Colaboradores</span></button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#CancelModel"> <i class="ri-close-circle-line"></i><span> Cancelar</span></button>
            <div class="d-grid gap-2 mt-3">
                <button type="button" class="btn btn-secondary"><i class="bi bi-eye "></i><span> Mais Detalhes</span></button>
            </div>
            <!-- End of project content -->
        </div>
        <div class="card-footer">
            13/11/2023 - 22h:39Min <i class="bi bi-clock "></i>
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
                   Realmente pretendes cancelar o projecto, se cancelares não poderás contribuir para o projecto.
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
