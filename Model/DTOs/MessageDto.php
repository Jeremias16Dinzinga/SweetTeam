<?php

if (isset($_GET['id_message'])) {
    $id_message = filter_input(INPUT_GET, 'id_message', FILTER_SANITIZE_NUMBER_INT);
} elseif (isset($_POST['id_message'])) {
    $id_message = filter_input(INPUT_POST, 'id_message', FILTER_SANITIZE_NUMBER_INT);
} else {
    $id_message = 0;
}

if (isset($_GET['title'])) {
    $title = filter_input(INPUT_GET, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_POST['title'])) {
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $title = "";
}

if (isset($_GET['content'])) {
    $content = filter_input(INPUT_GET, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_POST['content'])) {
    $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $content = "";
}

if (isset($_GET['id_destin'])) {
    $id_destin = filter_input(INPUT_GET, 'id_destin', FILTER_SANITIZE_NUMBER_INT);
} elseif (isset($_POST['id_destin'])) {
    $id_destin = filter_input(INPUT_POST, 'id_destin', FILTER_SANITIZE_NUMBER_INT);
} else {
    $id_destin = 0;
}

if (isset($_GET['id_sender'])) {
    $id_sender = filter_input(INPUT_GET, 'id_sender', FILTER_SANITIZE_NUMBER_INT);
} elseif (isset($_POST['id_sender'])) {
    $id_sender = filter_input(INPUT_POST, 'id_sender', FILTER_SANITIZE_NUMBER_INT);
} else {
    $id_sender = 0;
}
$dateTime = new DateTime();
$create_date = $dateTime->format('Y-m-d H:i:s');
$update_date = $dateTime->format('Y-m-d H:i:s');

?>