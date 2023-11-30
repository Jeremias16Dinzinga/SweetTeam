<?php
include('../DAO/Crud.php');
include('../Model/DTOs/CollaboratorDto.php');

$crud = new Crud();

$result = $crud->insertBD("collaborator", "?,?,?,?,?,?,?,?,?,?,?,?,?", array($id_collaborator, $name, $phone, $profession, $resume, $photo, $email, $password, $linkdinUrl, $twiterUrl, $githubUrl,null,null));
if ($result != null) {
    header('location:../View/login.php');
} else {
    header('location:../View/lregist.php?err=1');
}
?>