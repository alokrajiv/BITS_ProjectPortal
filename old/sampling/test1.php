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

















<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="../../assets/js/jquery.min.js"></script>
<link href="../../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="../../assets/js//bootstrap.min.js"></script>
    </head>
    <body>
        <?php
            session_start();
            require '../../configs/db_config.php';
            $sql = "SELECT `permitted_faculty`, `project_limit` FROM `students` where `user_id` = ? LIMIT 1";
            $sth = $conn->prepare($sql);
            $sth->execute(array( $_SESSION['user_id']));
            $res = $sth->fetch(\PDO::FETCH_ASSOC);
            $avail_faculty = json_decode($res['permitted_faculty']);
            $avail_faculty = $avail_faculty->faculty;
        ?>
        <form action="add_project.php" method="post">
            <select name="faculty">
                <?php
                        foreach ($avail_faculty as $value) {
                            echo "<option value=\"$value\">$value</option>";
                        }
                ?>
            </select>
            <button type="submit" class="btn btn-primary">PROCEED</button>
        </form>
    </body>
</html>
