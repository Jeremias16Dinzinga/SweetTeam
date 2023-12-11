<?php
include('../DAO/Crud.php');
include('../Model/DTOs/CollaboratorDto.php');
include('../Model/Enum/StatusNotice.php');

$crud = new Crud();

if ($first_name != null && $last_name != null && $phone != null && $profession != null && $photo != null && $email != null && $password != null && $country != null && $update_date != null) {
    $create_date = $dateTime->format('Y-m-d H:i:s');
    $result = $crud->insertBD("collaborator", "?,?,?,?,?,?,?,?,?,?,?,?,?,?,?", array($id_collaborator, $first_name, $last_name, $phone, $profession, $resume, $photo, $email, $password, $linkdinUrl, $twiterUrl, $githubUrl, $country, $create_date, $update_date));
    if ($result != null) {
        header('location:../View/login.php');
    } else {
        header('location:../View/regist.php?err=1');
    }
}


if (isset($_GET['add_collaborator_to_project'])) {
    $dateTime = new DateTime();
    $create_date = $dateTime->format('Y-m-d H:i:s');

    #adding collaborator to project
    $crud->insertBD("project_collaborator", "?,?", array($_GET['add_collaborator_to_project'], $_GET['this_project']));
    
    $project = $crud->selectBD("project", "*", "where id_project = '{$_GET['this_project']}'");
    $collaborator = $crud->selectBD("collaborator", "*", "where id_collaborator = '{$project['id_leader']}'");

    #Sending notification to the collaborator after be added
    $content = $collaborator["first_name"] . " " . $collaborator["last_name"] . " adicionou-te no projecto " . $project["description"] . ".";
    $crud->insertBD("notice", "?,?,?,?,?,?", array(0, "Adicionado ao projecto", $content, $_GET['add_collaborator_to_project'], StatusNotice::Pendente->name, $create_date));

    header('location:../View/addCollaborator.php?id=' . $_GET['this_project'] . '&&success=1');

}

if (isset($_GET['remove_collaborator_to_project'])) {

    $leader_id = $crud->selectBD("project", "id_leader", "where id_project = '{$_GET['this_project']}'")["id_leader"];

    if ($leader_id != $_GET['remove_collaborator_to_project']) {
        $crud->deleteBD("project_collaborator", "id_collaborator=? and id_project=? ", array($_GET['remove_collaborator_to_project'], $_GET['this_project']));
                
        $project = $crud->selectBD("project", "*", "where id_project = '{$_GET['this_project']}'");
        $collaborator = $crud->selectBD("collaborator", "*", "where id_collaborator = '{$project['id_leader']}'");

        #Sending notification to the collaborator after be removed in project
        $content = $collaborator["first_name"] . " " . $collaborator["last_name"] . " removeu-te do projecto " . $project["description"] . ".";
        $crud->insertBD("notice", "?,?,?,?,?,?", array(0, "Removido do projecto", $content, $_GET['remove_collaborator_to_project'], StatusNotice::Pendente->name, $create_date));
        header('location:../View/addCollaborator.php?id=' . $_GET['this_project']);
    } else {
        header('location:../View/addCollaborator.php?id=' . $_GET['this_project'] . '&&notAllowed=1');
    }





}

?>