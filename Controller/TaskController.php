<?php
include('../DAO/Crud.php');
include('../Model/DTOs/TaskDto.php');
include('../Model/Enum/StatusActivit.php');

$crud = new Crud();

#Insert new task
if ($id_task == 0 && $description != null && $description != "" && $id_project != null && $id_project != "" && $id_collaborator != null && $id_collaborator != "" && $update_date != null) {
    $create_date = $dateTime->format('Y-m-d H:i:s');
    $result = $crud->insertBD("task", "?,?,?,?,?,?,?,?,?", array($id_task, $description, $resume, StatusActivit::Pendente->name, $id_project, $id_collaborator, $deadline, $create_date, $update_date));
    if ($result != null) {
        header('location:../View/addTask.php?id_project=' . $id_project);
    } else {
        header('location:../View/addProject.php?err=1');
    }
}

#Update task status
if (isset($_GET['id_task'])) {
    $my_task = $crud->selectBD("task", "*", "where id_task = '{$_GET['id_task']}'");
    var_dump($my_task);
    if ($my_task['status'] == "Pendente" || $my_task['status'] == "Atrazado") {
        $result = $crud->updateBD("task", "status=?", "id_task = '{$_GET['id_task']}'", array(StatusActivit::Concluido->name));
    } else {
        $result = $crud->updateBD("task", "status=?", "id_task = '{$_GET['id_task']}'", array(StatusActivit::Pendente->name));
    }

    header('location:../View/tasks.php?target=' . $_GET['status']);
}

#Update task nformations
if ($id_task!= 0 && $description != null && $description != "" && $id_project != null && $id_collaborator != null) {
    $result = $crud->updateBD("task", "description=?, resume=?, status=?, id_collaborator=?, deadline=?, update_date=?", "id_task = ?", array($description, $resume, StatusActivit::Pendente->name, $id_collaborator, $deadline, $update_date, $id_task));
    header('location:../View/addTask.php?id_project=' . $id_project);
}
