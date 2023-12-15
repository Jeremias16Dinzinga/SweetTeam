<?php
include('../DAO/Crud.php');
include('../Model/DTOs/ProjectDto.php');
include('../Model/Enum/StatusActivit.php');

$crud = new Crud();

$result = $crud->insertBD("project", "?,?,?,?,?,?,?,?", array($id_project, $description, $scope, $deadline, $id_leader,StatusActivit::Pendente->name,$create_date,$update_date));
if ($result != null) {
    $consult = $crud->selectBD("project", "*", "where scope = '{$scope}'");
    $crud->insertBD("project_collaborator", "?,?", array($id_leader, $consult['id_project']));    
    header('location:../View/addCollaborator.php?id_project='.$consult['id_project']);
} else {
    header('location:../View/addProject.php?err=1');
}
