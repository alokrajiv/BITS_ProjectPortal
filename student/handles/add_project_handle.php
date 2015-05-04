<?php
require '../../configs/auto_config.php';
session_start();
$sql = "    
        SELECT * FROM  `pp_invites` WHERE  `status`='LIVE' AND `invite_id` =?
        ";
$sth = $conn->prepare($sql);
$sth->execute(array($_POST['invite_id']));
$res = $sth->fetch();
if($res===FALSE){
        echo '<h1>';
        header('HTTP/1.1 404 Not Found', true, 404);
        die("HTTP/1.1 404 Not Found");
}
else if($res ["student"]!=$_SESSION['cached_users_data']['ucid']){
        echo '<h1>';
        header('HTTP/1.1 401 Unauthorized', true, 401);
        die("HTTP/1.1 401 Unauthorized");
}
$sql = "
            INSERT INTO  `bpdc_db`.`pp_projects` (
                    `invite_id` ,
                    `faculty` ,
                    `student` ,
                    `comp_code` ,
                    `course_no` ,
                    `project_title` ,
                    `course_title`,
                    `scope`
                    )
                    VALUES (
                      ?,  ?,  ?,  ?,  ?,  ?,  ?, ?
                    );
        ";
$sth = $conn->prepare($sql);
$sth->execute(array($_POST['invite_id'],$_POST['faculty'],$_POST['student'],$_POST['comp_code'],$_POST['course_no'],$_POST['project_title'],$_POST['course_title'],$_POST['scope']));
$sql = "
           UPDATE  `bpdc_db`.`pp_invites` SET  `status` =  'DEAD' WHERE  `pp_invites`.`invite_id` =?;
        ";
$sth = $conn->prepare($sql);
$sth->execute(array($_POST['invite_id']));
