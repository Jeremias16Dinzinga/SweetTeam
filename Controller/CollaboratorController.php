<?php
include('../DAO/Crud.php');
include('../Model/DTOs/CollaboratorDto.php');

$crud = new Crud();

$result = $crud->insertBD("collaborator", "?,?,?,?,?,?,?,?,?,?,?,?,?,?", array($id_collaborator, $first_name,$last_name, $phone, $profession, $resume, $photo, $email, $password, $linkdinUrl, $twiterUrl, $githubUrl, $create_date, $update_date));
if ($result != null) {
    header('location:../View/login.php');
} else {
    header('location:../View/lregist.php?err=1');
}

?>