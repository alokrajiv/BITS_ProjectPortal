<?php

//$options = [
//    'cost' => 11,
//];
//// Get the password from post
//$passwordFromPost = "securetoken";
//
//$hash = password_hash($passwordFromPost, PASSWORD_BCRYPT, $options);
//
//var_dump($hash);
//
////$passwordFromPost = $_POST['password'];
//$hashedPasswordFromDB = $hash;
//
//if (password_verify($passwordFromPost, $hashedPasswordFromDB)) {
//    echo 'Password is valid!';
//} else {
//    echo 'Invalid password.';
//}



//require '/home/alokrajiv/configs/db_config.php';
//$usernameFromPost = '2013A7PS119U';
//$sql = "SELECT `user-id`, `login-password`, `user-type` FROM `login_creds` where `user-id` = ? LIMIT 1";
//$sth = $conn->prepare($sql);
//$sth->execute(array( $usernameFromPost));
//$res = $sth->fetch();
//var_dump($res);


$arr = array();
$arr['faculty'] = array("1112","2231");
var_dump(json_encode($arr));