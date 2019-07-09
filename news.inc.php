<?php

include("config.php");
include('UserController.phpinclude('NewsController.php');
$userClass = new UserController();
$userNews = new NewsController();
var_dump($session_uid);exit;
$userDetails = $userClass->userDetails($session_uid);

$errorMsgReg='';
$errorMsgLogin='';

if (!empty($_POST['saveNews']))
{
    $name=$_POST['name'];
    $description=$_POST['description'];
    $active=$_POST['active'];

    if(strlen(trim($email))>1 && strlen(trim($password))>1 )
    {
        $uid=$userNews->add($id,$name,$description,$active);
        if($uid)
        {
            $url=BASE_URL.'home.php';
            header("Location: ../home.php"); // Page redirecting to home.php
        }
        else
        {
            $errorMsgLogin="Please check login details.";
        }
    }
}