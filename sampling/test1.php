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


//$arr = array();
//$arr['faculty'] = array("1112","2231");
//var_dump(json_encode($arr));


$str = '{"faculty":["1112","2231"]}';
$arr = json_decode($str)->faculty;
var_dump($arr);
unset($arr[array_search("2231", $arr)]);
var_dump($arr);
echo '<br>';
$arr1 = array();
$arr1['faculty'] = $arr;
$str = json_encode($arr1);
var_dump($str); 
$arr =(array) json_decode($str)->faculty;
var_dump($arr);
unset($arr[array_search("1112", $arr)]);
var_dump($arr);
