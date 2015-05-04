<?php

session_start();
require '../../configs/auto_config.php';
$student_ucid = $_POST['student_ucid'];
$sql = "
        INSERT INTO  `bpdc_db`.`pp_invites` (`faculty` ,`student`) VALUES ( ?, ? );
        ";
$sth = $conn->prepare($sql);
$sth->execute(array( $_SESSION['cached_users_data']['ucid'], $student_ucid));
