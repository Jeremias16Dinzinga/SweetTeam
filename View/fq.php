<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Perguntas Frequentes</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!--Calling the header of my Templente-->
    <?php
    require_once 'header.php';
    ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Perguntas Frequentes</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Perguntas</li>
                    <li class="breadcrumb-item active">Todas</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-6">
                    <!-- F.A.Q Group 1 -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Usuários e Colaboradores</h5>

                            <div class="accordion accordion-flush" id="faq-group-2">

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-target="#faqsTwo-1"
                                            type="button" data-bs-toggle="collapse">
                                            Como posso adicionar um novo colaborador a um projeto?
                                        </button>
                                    </h2>
                                    <div id="faqsTwo-1" class="accordion-collapse collapse"
                                        data-bs-parent="#faq-group-2">
                                        <div class="accordion-body">
                                            R: Dentro do projeto desejado, vá para a seção "Adicionar Usuário" e insira
                                            as informações do colaborador que deseja incluir.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-target="#faqsTwo-1"
                                            type="button" data-bs-toggle="collapse">
                                            Como posso cadastrar um novo usuário no Sweet Team?
                                        </button>
                                    </h2>
                                    <div id="faqsTwo-1" class="accordion-collapse collapse"
                                        data-bs-parent="#faq-group-2">
                                        <div class="accordion-body">
                                            R:Para cadastrar um novo usuário, basta acessar a função "Cadastro de
                                            Usuários" na interface principal e preencher as informações necessárias.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-target="#faqsTwo-2"
                                            type="button" data-bs-toggle="collapse">
                                            Como faço para visualizar e listar todas as tarefas atribuídas a mim?
                                        </button>
                                    </h2>
                                    <div id="faqsTwo-2" class="accordion-collapse collapse"
                                        data-bs-parent="#faq-group-2">
                                        <div class="accordion-body">
                                            R: No seu perfil, vá para a seção "Listar Tarefas" para ver todas as tarefas
                                            atribuídas a você.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-target="#faqsTwo-4"
                                            type="button" data-bs-toggle="collapse">
                                            Como atribuo uma tarefa a um colaborador?
                                        </button>
                                    </h2>
                                    <div id="faqsTwo-4" class="accordion-collapse collapse"
                                        data-bs-parent="#faq-group-2">
                                        <div class="accordion-body">
                                            R:Atribuir tarefas é simples no Sweet Team. Utilize a função "Adicionar Tarefa
                                            ao Projeto" e selecione o usuário destinatário da tarefa.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-target="#faqsTwo-5"
                                            type="button" data-bs-toggle="collapse">
                                            Como posso editar as informações do meu perfil de usuário?
                                        </button>
                                    </h2>
                                    <div id="faqsTwo-5" class="accordion-collapse collapse"
                                        data-bs-parent="#faq-group-2">
                                        <div class="accordion-body">
                                        R: Acesse a seção "Editar Perfil do Usuário" para modificar as informações do seu perfil, como nome, senha, etc.
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div><!-- End F.A.Q Group 1 -->

                </div>
                <div class="col-lg-6">
                    <!-- F.A.Q Group 2 -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Gerenciamento de Projetos e Relatórios</h5>

                            <div class="accordion accordion-flush" id="faq-group-2">

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-target="#faqsTwo-1"
                                            type="button" data-bs-toggle="collapse">
                                            Posso editar o prazo de um projeto já em andamento?
                                        </button>
                                    </h2>
                                    <div id="faqsTwo-1" class="accordion-collapse collapse"
                                        data-bs-parent="#faq-group-2">
                                        <div class="accordion-body">
                                            R: Sim, os responsáveis pelo projeto podem editar o prazo a qualquer momento
                                            na seção "Editar Prazo do Projeto".
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-target="#faqsTwo-2"
                                            type="button" data-bs-toggle="collapse">
                                            É possível acompanhar a evolução do projeto em tempo real?
                                        </button>
                                    </h2>
                                    <div id="faqsTwo-2" class="accordion-collapse collapse"
                                        data-bs-parent="#faq-group-2">
                                        <div class="accordion-body">
                                            R: Sim, a funcionalidade "Ver Relatório do Projeto em Tempo Real" permite
                                            monitorar a evolução do projeto através de relatórios gerados pelo sistema.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-target="#faqsTwo-3"
                                            type="button" data-bs-toggle="collapse">
                                            Quais são as opções de edição para uma tarefa específica?
                                        </button>
                                    </h2>
                                    <div id="faqsTwo-3" class="accordion-collapse collapse"
                                        data-bs-parent="#faq-group-2">
                                        <div class="accordion-body">
                                            R: Os responsáveis podem editar o prazo, o escopo e a descrição da tarefa na
                                            seção "Editar Tarefa".
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-target="#faqsTwo-4"
                                            type="button" data-bs-toggle="collapse">
                                            Como excluo um projeto no Sweet Team?
                                        </button>
                                    </h2>
                                    <div id="faqsTwo-4" class="accordion-collapse collapse"
                                        data-bs-parent="#faq-group-2">
                                        <div class="accordion-body">
                                            R: Vá para a seção "Deletar Projeto" e siga as instruções para excluir um
                                            projeto específico.

                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-target="#faqsTwo-5"
                                            type="button" data-bs-toggle="collapse">
                                            Posso excluir um colaborador de um projeto? Como?
                                        </button>
                                    </h2>
                                    <div id="faqsTwo-5" class="accordion-collapse collapse"
                                        data-bs-parent="#faq-group-2">
                                        <div class="accordion-body">
                                            R: Sim, na seção "Excluir Usuário de um Projeto", escolha o usuário que
                                            deseja remover e confirme a exclusão.
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div><!-- End F.A.Q Group 2 -->

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