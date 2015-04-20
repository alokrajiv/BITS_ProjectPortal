<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require '../configs/db_config.php';
$usernameFromPost = $_POST['login-id'];
$passwordFromPost = $_POST['login-password'];
$sql = "SELECT `user-id`, `login-password`, `user-type` FROM `login_creds` where `user-id` like '$usernameFromPost'";
$res="";
foreach ($conn->query($sql) as $row) {
    $res = $row;
}
$hashedPasswordFromDB = $res["login-password"];
if (password_verify($passwordFromPost, $hashedPasswordFromDB)) {
    echo 'Password is valid!';
    session_start();
    $_SESSION['user-id']= $res["user-id"];
    $_SESSION['user-type']= $res["user-type"];
} else {
    echo 'Invalid password.';
}