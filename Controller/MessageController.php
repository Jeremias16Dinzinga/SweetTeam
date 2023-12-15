<?php
include('../DAO/Crud.php');
include('../Model/DTOs/MessageDto.php');
include('../Model/Enum/StatusNotice.php');

$crud = new Crud();

if ($id_destin !=0) {
    $result = $crud->insertBD("message", "?,?,?,?,?,?,?,?", array($id_message, $title, $content, $id_sender, $id_destin, StatusNotice::Pendente->name, $create_date, $update_date));
    header('location:../View/sendMessage.php');
} else {
    header('location:../View/sendMessage.php?errDestin=1');
}
