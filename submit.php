<?php
include("config.php");
include('app/Controller/UserController.php');
include('app/Controller/NewsController.php');
$userNews = new NewsController();
$userClass = new UserController();

$errorMsgReg = '';
$errorMsgLogin = '';
/* Login Form */
if (!empty($_POST['loginSubmit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (strlen(trim($email)) > 1 && strlen(trim($password)) > 1) {
        $uid = $userClass->userLogin($email, $password);
        if ($uid) {
            $url = BASE_URL . 'home.php';
            header("Location: ../home.php"); // Page redirecting to home.php
        } else {
            $errorMsgLogin = "Please check login details.";
        }
    }
}

/* Signup Form */
if (!empty($_POST['signupSubmit'])) {
    $username = $_POST['first_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    /* Regular expression check */

    $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
    $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
    $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);

//    if($username_check && $email_check && $password_check)
//    {
    $uid = $userClass->userRegistration($username, $password, $email);
    if ($uid) {
        $url = BASE_URL . 'home.php';
        header("Location: ../home.php"); // Page redirecting to home.php
    } else {
        $errorMsgReg = "Username or Email already exists.";
    }
    //}
}


if (!empty($_POST['newsSubmit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $active = ($_POST['active'] ? 1 : 0);
    if (strlen(trim($title)) > 1 && strlen(trim($description)) > 1) {

        $uid = $userNews->add($_SESSION['id'], $title, $description, $active);
        if ($uid) {
            $url = BASE_URL . 'home.php';
            header("Location: ../home.php"); // Page redirecting to home.php
        } else {
            $errorMsgLogin = "Please check login details.";
        }
    }
}

if (!empty($_POST['newsUpdateSubmit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $active = ($_POST['active'] ? 1 : 0);
    if (strlen(trim($title)) > 1 && strlen(trim($description)) > 1) {
        $uid = $userNews->update($_SESSION['newsId'], $title, $description, $active);
        if ($uid) {
            $url = BASE_URL . 'home.php';
            header("Location: ../home.php");
        } else {
            $errorMsgLogin = "Please check login details.";
        }
    }
}


?>