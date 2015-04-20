<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require '../configs/db_config.php';
$usernameFromPost = $_POST['login-id'];
$passwordFromPost = $_POST['login-password'];
$sql = "SELECT `user_id`, `login_password`, `user_type` FROM `login_creds` where `user_id` = ? LIMIT 1";
$sth = $conn->prepare($sql);
$sth->execute(array( $usernameFromPost));
$res = $sth->fetch();
$hashedPasswordFromDB = $res["login_password"];
if (password_verify($passwordFromPost, $hashedPasswordFromDB)) {
    echo 'Password is valid!';
    session_start();
    $_SESSION['user_id']= $res["user_id"];
    $_SESSION['user_type']= $res["user_type"];
    header("Location: ../home");
} else {
    echo 'Invalid password.';
}
