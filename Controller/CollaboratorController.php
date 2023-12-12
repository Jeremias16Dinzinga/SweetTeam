<?php
include('../DAO/Crud.php');
include('../Model/DTOs/CollaboratorDto.php');
include('../Model/Enum/StatusNotice.php');

$crud = new Crud();

#Regist a new user
if ($first_name != null && $last_name != null && $phone != null && $profession != null && $photo != null && $email != null && $password != null && $country != null && $update_date != null) {
    $create_date = $dateTime->format('Y-m-d H:i:s');
    $result = $crud->insertBD("collaborator", "?,?,?,?,?,?,?,?,?,?,?,?,?,?,?", array($id_collaborator, $first_name, $last_name, $phone, $profession, $resume, $photo, $email, $password, $linkedinUrl, $twitterUrl, $githubUrl, $country, $create_date, $update_date));
    if ($result != null) {
        header('location:../View/login.php');
    } else {
        header('location:../View/regist.php?err=1');
    }
}

#Updating the profile
if ($id_collaborator != null && $first_name != null && $last_name != null && $profession != null) {
    if ($photo != "") {
        $result = $crud->updateBD("collaborator", "first_name=?,last_name=?, phone=?, profession=?, resume=?, photo=?, email=?, linkedinUrl=?, twitterUrl=?, githubUrl=?, country=?, update_date=?", "id_collaborator = ?", array($first_name, $last_name, $phone, $profession, $resume, $photo, $email, $linkedinUrl, $twitterUrl, $githubUrl, $country, $update_date, $id_collaborator));
    } else {
        $result = $crud->updateBD("collaborator", "first_name=?,last_name=?, phone=?, profession=?, resume=?, email=?, linkedinUrl=?, twitterUrl=?, githubUrl=?, country=?, update_date=?", "id_collaborator = ?", array($first_name, $last_name, $phone, $profession, $resume, $email, $linkedinUrl, $twitterUrl, $githubUrl, $country, $update_date, $id_collaborator));
    }

    if ($result != null) {
        header('location:../View/profile.php');
    } else {
        header('location:../View/profile.php?err=1');
    }
}

#Changing password
if (isset($_POST['current_password'])) {
    $current_password = md5(filter_input(INPUT_POST, 'current_password', FILTER_SANITIZE_SPECIAL_CHARS));
    $new_password = md5(filter_input(INPUT_POST, 'new_password', FILTER_SANITIZE_SPECIAL_CHARS));
    $confirm_password = md5(filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_SPECIAL_CHARS));

    $collaborator = $crud->selectBD("collaborator", "*", "where id_collaborator = '{$id_collaborator}'");

    if ($collaborator['password'] != $current_password) {
        header('location:../View/profile.php?denied=1');
    } elseif ($new_password == $confirm_password) {
        $crud->updateBD("collaborator", "password=?", "id_collaborator = ?", array($new_password, $id_collaborator));
        header('location:../View/profile.php?success=1');
    }else{
        header('location:../view/profile.php?passwordValidation=1');
    }
}


if (isset($_GET['add_collaborator_to_project'])) {
    $create_date = $dateTime->format('Y-m-d H:i:s');

    #adding collaborator to project
    $crud->insertBD("project_collaborator", "?,?", array($_GET['add_collaborator_to_project'], $_GET['this_project']));

    $project = $crud->selectBD("project", "*", "where id_project = '{$_GET['this_project']}'");
    $collaborator = $crud->selectBD("collaborator", "*", "where id_collaborator = '{$project['id_leader']}'");

    #Sending notification to the collaborator after be added
    $content = $collaborator["first_name"] . " " . $collaborator["last_name"] . " adicionou-te no projecto " . $project["description"] . ".";
    $crud->insertBD("notice", "?,?,?,?,?,?", array(0, "Adicionado ao projecto", $content, $_GET['add_collaborator_to_project'], StatusNotice::Pendente->name, $create_date));

    header('location:../View/addCollaborator.php?id_project=' . $_GET['this_project'] . '&&success=1');

}

if (isset($_GET['remove_collaborator_to_project'])) {
    $create_date = $dateTime->format('Y-m-d H:i:s');
    $leader_id = $crud->selectBD("project", "id_leader", "where id_project = '{$_GET['this_project']}'")["id_leader"];

    #Delete a collqborator from a project
    if ($leader_id != $_GET['remove_collaborator_to_project']) {
        $crud->deleteBD("project_collaborator", "id_collaborator=? and id_project=? ", array($_GET['remove_collaborator_to_project'], $_GET['this_project']));        

        $project = $crud->selectBD("project", "*", "where id_project = '{$_GET['this_project']}'");
        $collaborator = $crud->selectBD("collaborator", "*", "where id_collaborator = '{$project['id_leader']}'");

        #Take all of this project from the deleted collaborator
        $crud->updateBD("task","id_collaborator=?","id_collaborator = '{$_GET['remove_collaborator_to_project']}'",array($project['id_leader']));

        #Sending notification to the collaborator after be removed in project
        $content = $collaborator["first_name"] . " " . $collaborator["last_name"] . " removeu-te do projecto " . $project["description"] . ".";
        $crud->insertBD("notice", "?,?,?,?,?,?", array(0, "Removido do projecto", $content, $_GET['remove_collaborator_to_project'], StatusNotice::Pendente->name, $create_date));
        header('location:../View/addCollaborator.php?id_project=' . $_GET['this_project']);
    } else {
        header('location:../View/addCollaborator.php?id_project=' . $_GET['this_project'] . '&&notAllowed=1');
    }





}

?>