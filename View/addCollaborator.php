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
    ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Adicionar Colaborador</h1>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $crud = new Crud();
                                    $result = $crud->selectBD("collaborator", "*", "");                                                                        
                                    foreach ($result as $item) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo ($item['first_name']." ".$item['last_name']); ?>
                                            </td>
                                            <td>
                                                <?php echo $item['profession']; ?>
                                            </td>
                                            <td><button type="text" class="btn btn-success"><i
                                                        class="bi bi-plus-circle"></i></button></td>
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
        </section>
    </main><!-- End #main -->

    <!--Calling the footer of my Templente-->
    <?php
    require_once 'footer.php';
    ?>

    </body>

</html>