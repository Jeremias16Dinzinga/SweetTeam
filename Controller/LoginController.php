<?php
include('../DAO/Crud.php');

$crud = new Crud();
session_start();

if (isset($_POST['email'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
} else {
    $email = "";
}

if (isset($_POST['password'])) {
    $password = md5(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS));
} else {
    $password = "";
}

$result = $crud->selectBD("collaborator", "*", "where email = '{$email}' and password = '{$password}'");

$_SESSION['id_user'] = $result['id_collaborator'];
$_SESSION['user_name'] = $result['name'];
$_SESSION['password'] = $result['password'];
$_SESSION['photo'] = $result['photo'];
$_SESSION['profession'] = $result['profession'];

if ($_SESSION['id_user'] != "" || $_SESSION['id_user'] != null) {
    header('location:../view/index.php');
} else {
    header('location:../view/login.php?err=1');
}

?>