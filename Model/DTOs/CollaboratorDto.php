<?php

if (isset($_GET['password'])) {
    $password = filter_input(INPUT_GET, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_POST['password'])) {
    $password = md5(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS));
} else {
    $password = "";
}

if (isset($_GET['passwordConfirm'])) {
    $passwordConfirm = filter_input(INPUT_GET, 'passwordConfirm', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_POST['passwordConfirm'])) {
    $passwordConfirm = md5(filter_input(INPUT_POST, 'passwordConfirm', FILTER_SANITIZE_SPECIAL_CHARS));
} else {
    $passwordConfirm = "";
}

if ($password != $passwordConfirm) {
    header('location:../view/regist.php?passwordValidation=1');
} else {

    if (isset($_GET['id_collaborator'])) {
        $id_collaborador = filter_input(INPUT_GET, 'id_collaborator', FILTER_SANITIZE_NUMBER_INT);
    } elseif (isset($_POST['id_collaborator'])) {
        $id_collaborator = filter_input(INPUT_POST, 'id_collaborator', FILTER_SANITIZE_NUMBER_INT);
    } else {
        $id_collaborator = 0;
    }

    if (isset($_GET['first_name'])) {
        $first_name = filter_input(INPUT_GET, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
    } elseif (isset($_POST['first_name'])) {
        $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $first_name = "";
    }

    if (isset($_GET['last_name'])) {
        $last_name = filter_input(INPUT_GET, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
    } elseif (isset($_POST['last_name'])) {
        $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $last_name = "";
    }

    if (isset($_GET['phone']) && isset($_GET['country_code'])) {
        $phone = filter_input(INPUT_GET, 'country_code', FILTER_SANITIZE_SPECIAL_CHARS)." ".filter_input(INPUT_GET, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
    } elseif (isset($_POST['phone'])) {
        $phone = filter_input(INPUT_POST, 'country_code', FILTER_SANITIZE_SPECIAL_CHARS)." ".filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $phone = "";
    }

    if (isset($_GET['profession'])) {
        $profession = filter_input(INPUT_GET, 'profession', FILTER_SANITIZE_SPECIAL_CHARS);
    } elseif (isset($_POST['profession'])) {
        $profession = filter_input(INPUT_POST, 'profession', FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $profession = "";
    }

    if (isset($_GET['resume'])) {
        $resume = filter_input(INPUT_GET, 'resume', FILTER_SANITIZE_SPECIAL_CHARS);
    } elseif (isset($_POST['resume'])) {
        $resume = filter_input(INPUT_POST, 'resume', FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $resume = "";
    }

    if (isset($_GET['email'])) {
        $email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);
    } elseif (isset($_POST['email'])) {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    } else {
        $email = "";
    }

    if (isset($_GET['linkdinUrl'])) {
        $linkdinUrl = filter_input(INPUT_GET, 'linkdinUrl', FILTER_SANITIZE_URL);
    } elseif (isset($_POST['linkdinUrl'])) {
        $linkdinUrl = filter_input(INPUT_POST, 'linkdinUrl', FILTER_SANITIZE_URL);
    } else {
        $linkdinUrl = "#";
    }

    if (isset($_GET['twiterUrl'])) {
        $twiterUrl = filter_input(INPUT_GET, 'twiterUrl', FILTER_SANITIZE_URL);
    } elseif (isset($_POST['twiterUrl'])) {
        $twiterUrl = filter_input(INPUT_POST, 'twiterUrl', FILTER_SANITIZE_URL);
    } else {
        $twiterUrl = "#";
    }

    if (isset($_GET['githubUrl'])) {
        $githubUrl = filter_input(INPUT_GET, 'githubUrl', FILTER_SANITIZE_URL);
    } elseif (isset($_POST['githubUrl'])) {
        $githubUrl = filter_input(INPUT_POST, 'githubUrl', FILTER_SANITIZE_URL);
    } else {
        $githubUrl = "#";
    }

    if (isset($_GET['country'])) {
        $country = filter_input(INPUT_GET, 'country', FILTER_SANITIZE_SPECIAL_CHARS);
    } elseif (isset($_POST['country'])) {
        $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $country = "";
    }

    if (isset($_FILES['photo'])) {

        $allowedFormat = array("png", "jpeg", "jpg", "gif");
        $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);

        if (in_array($extension, $allowedFormat)) {
            $folder = "../assets/Files/collaborator/";
            $temporary = $_FILES['photo']['tmp_name'];
            $newName = uniqid() . ".$extension";
            move_uploaded_file($temporary, $folder . $newName);
            $photo = "../assets/Files/collaborator/" . $newName;
        } else {
            $photo = "";
            $photoErr = "Format Invalid";
        }
    } else {
        $photo = "";
    }
    $dateTime = new DateTime();
    
    $update_date = $dateTime->format('Y-m-d H:i:s');    
}
?>