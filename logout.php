<?php
include('config.php');
$session_uid = '';
$_SESSION['id'] = '';
if (empty($session_uid) && empty($_SESSION['id'])) {
    header("Location: ../index.php");
}
?>