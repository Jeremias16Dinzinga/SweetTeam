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
$_SESSION['user_name'] = $result['first_name']." ".$result['last_name'];
$_SESSION['password'] = $result['password'];
$_SESSION['photo'] = $result['photo'];
$_SESSION['profession'] = $result['profession'];
$_SESSION['githubUrl'] = $result['githubUrl'];
$_SESSION['linkedinUrl'] = $result['linkedinUrl'];
$_SESSION['twitterUrl'] = $result['twitterUrl'];
$_SESSION['resume'] = $result['resume'];
$_SESSION['phone'] = $result['phone'];
$_SESSION['country'] = $result['country'];
$_SESSION['email'] = $result['email'];

if ($_SESSION['id_user'] != "" || $_SESSION['id_user'] != null) {
    header('location:../view/index.php');
} else {
    header('location:../view/login.php?err=1');
}

?>