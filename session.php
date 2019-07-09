<?php
if (isset($_SESSION['id']))
{
    $session_uid = $_SESSION['id'];
    include('app/Controller/UserController.php');
    include('app/Controller/NewsController.php');
    $userNews = new NewsController();
    $userClass = new UserController();
    $userDetails = $userClass->userDetails($session_uid);

    //$session_uid = $userClass->getUserId($_SESSION['email']);
}

if (empty($session_uid))
{
    $url=BASE_URL.'index.php';
    header("Location: ../index.php");
}
?>