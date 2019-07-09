<?php

if (isset($_POST['login-submit'])) {

    require 'db.inc.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users2 WHERE id=? OR email=". $email ." ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    } else {
        mysqli_stmt_bind_result($stmt,  $email, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc()) {
            $pwdCheck = password_verify($password, $row['password']);
            if ($pwdCheck) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];

                header("Location: ../panel.php?login=success");

                exit();
            } else {
                die('wrong');
                exit();
            }
        } else {
            exit();
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}