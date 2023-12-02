<?php

if (isset($_GET['id_project'])) {
    $id_project = filter_input(INPUT_GET, 'id_project', FILTER_SANITIZE_NUMBER_INT);
} elseif (isset($_POST['id_project'])) {
    $id_project = filter_input(INPUT_POST, 'id_project', FILTER_SANITIZE_NUMBER_INT);
} else {
    $id_project = 0;
}

if (isset($_GET['description'])) {
    $description = filter_input(INPUT_GET, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_POST['description'])) {
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $description = "";
}

if (isset($_GET['scope'])) {
    $scope = filter_input(INPUT_GET, 'scope', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_POST['scope'])) {
    $scope = filter_input(INPUT_POST, 'scope', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $scope = "";
}

if (isset($_GET['deadline'])) {
    $deadline = filter_input(INPUT_GET, 'deadline', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_POST['deadline'])) {
    $deadline = filter_input(INPUT_POST, 'deadline', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $deadline = "";
}

if (isset($_GET['id_leader'])) {
    $id_leader = filter_input(INPUT_GET, 'id_leader', FILTER_SANITIZE_NUMBER_INT);
} elseif (isset($_POST['id_leader'])) {
    $id_leader = filter_input(INPUT_POST, 'id_leader', FILTER_SANITIZE_NUMBER_INT);
} else {
    $id_leader = 0;
}

?>