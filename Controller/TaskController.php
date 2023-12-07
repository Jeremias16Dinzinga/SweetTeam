<?php
include('../DAO/Crud.php');
include('../Model/DTOs/TaskDto.php');
include('../Model/Enum/StatusActivit.php');

$crud = new Crud();
if ($description != null && $description != "" && $id_project != null && $id_project != "" && $id_collaborator != null && $id_collaborator != "" && $create_date != null && $update_date != null) {
    $result = $crud->insertBD("task", "?,?,?,?,?,?,?,?", array($id_task, $description,StatusActivit::Pendente->name,$id_project, $id_collaborator, $deadline, $create_date, $update_date));
    if ($result != null) { 
        header('location:../View/addTask.php?id=' . $id_project);
    } else {
        header('location:../View/addProject.php?err=1');
    }

}
