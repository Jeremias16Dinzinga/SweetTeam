<?php

if (isset($_GET['id_task'])) {
    $id_task = filter_input(INPUT_GET, 'id_task', FILTER_SANITIZE_NUMBER_INT);
} elseif (isset($_POST['id_task'])) {
    $id_task = filter_input(INPUT_POST, 'id_task', FILTER_SANITIZE_NUMBER_INT);
} else {
    $id_task = 0;
}

if (isset($_GET['description'])) {
    $description = filter_input(INPUT_GET, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_POST['description'])) {
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $description = "";
}

if (isset($_GET['id_project'])) {
    $id_project = filter_input(INPUT_GET, 'id_project', FILTER_SANITIZE_NUMBER_INT);
} elseif (isset($_POST['id_project'])) {
    $id_project = filter_input(INPUT_POST, 'id_project', FILTER_SANITIZE_NUMBER_INT);
} else {
    $id_project = 0;
}

if (isset($_GET['deadline'])) {
    $deadline = filter_input(INPUT_GET, 'deadline', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_POST['deadline'])) {
    $deadline = filter_input(INPUT_POST, 'deadline', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $deadline = "";
}

if (isset($_GET['id_collaborator'])) {
    $id_collaborator = filter_input(INPUT_GET, 'id_collaborator', FILTER_SANITIZE_NUMBER_INT);
} elseif (isset($_POST['id_collaborator'])) {
    $id_collaborator = filter_input(INPUT_POST, 'id_collaborator', FILTER_SANITIZE_NUMBER_INT);
} else {
    $id_collaborator = 0;
}

$dateTime = new DateTime();

$create_date = $dateTime->format('Y-m-d H:i:s');
$update_date = $dateTime->format('Y-m-d H:i:s');

?>