<?php
include('../DAO/Crud.php');
include('../Model/DTOs/CollaboratorDto.php');

$crud = new Crud();

if ($id_collaborator != null && $first_name != null && $last_name != null && $phone != null && $profession != null && $photo != null && $email != null && $password != null && $create_date != null && $update_date != null) {
    $result = $crud->insertBD("collaborator", "?,?,?,?,?,?,?,?,?,?,?,?,?,?", array($id_collaborator, $first_name, $last_name, $phone, $profession, $resume, $photo, $email, $password, $linkdinUrl, $twiterUrl, $githubUrl, $create_date, $update_date));
    if ($result != null) {
        header('location:../View/login.php');
    } else {
        header('location:../View/lregist.php?err=1');
    }
}


if (isset($_GET['add_collaborator_to_project'])) {
    $crud->insertBD("project_collaborator", "?,?", array($_GET['add_collaborator_to_project'], $_GET['this_project']));
    header('location:../View/addCollaborator.php?id='.$_GET['this_project']);

}

if (isset($_GET['remove_collaborator_to_project'])) { 
    
    $leader_id = $crud->selectBD("project", "id_leader", "where id_project = '{$_GET['this_project']}'")["id_leader"];

    if($leader_id != $_GET['remove_collaborator_to_project']){
        $crud->deleteBD("project_collaborator","id_collaborator=? and id_project=? ",array($_GET['remove_collaborator_to_project'], $_GET['this_project']));
        header('location:../View/addCollaborator.php?id='.$_GET['this_project']);
    }else{
        header('location:../View/addCollaborator.php?id='.$_GET['this_project']);
    }

    
    
    

}

?>