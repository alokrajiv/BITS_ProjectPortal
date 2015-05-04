<?php
$_POST['reset_id'] = "assdsadfdsfsdfsdfwedwtgtnnspvmkje2342r323";
$_POST['new_password'] = "alokrajiv";

require '../configs/debugger.php';
require '../configs/db_config.php';
$options = [
    'cost' => 11,
];
$passwordFromPost = $_POST['new_password'];
$reset_id = $_POST['reset_id'];
$hash = password_hash($passwordFromPost, PASSWORD_BCRYPT, $options);
$sql = "
        UPDATE  `bpdc_db`.`users_data` SET  `password` =  ? WHERE  `users_data`.`ucid`  IN
        (SELECT `ucid` FROM `password_resets` WHERE `password_resets`.`reset_id` = ?);
        ";
$sth = $conn->prepare($sql);
$sth->execute(array( $hash, $reset_id));