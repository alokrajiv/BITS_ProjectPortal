<?php


require '../configs/db_config.php';
$usernameFromPost = $_POST['login-id'];
$passwordFromPost = $_POST['login-password'];
$sql = "
        SELECT * FROM `users_data` where `uhid` = ? OR `email` = ? LIMIT 1
        ";
$sth = $conn->prepare($sql);
$sth->execute(array( $usernameFromPost, $usernameFromPost));
$res = $sth->fetch();
$hashedPasswordFromDB = $res["password"];
if (password_verify($passwordFromPost, $hashedPasswordFromDB)) {
    echo 'Password is valid!';
    session_start();
    $res['fullname'] = $res['prefix'].' '.$res['fname'].' '.$res['mname'].' '.$res['lname'];
    $_SESSION['cached_users_data']= $res;
    if( substr($_SESSION['cached_users_data']['designation'], 0, 3) == 'STU'){
        header("Location: ../student/");
    }
    else  if( substr($_SESSION['cached_users_data']['designation'], 0, 3) == 'FAC'){
        header("Location: ../faculty/");
    }
} else {
    echo 'Invalid password.';
}
