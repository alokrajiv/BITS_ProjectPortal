<?php
    session_start();
    require '../../../configs/db_config.php';
    $_POST['faculty'] = "2231";
    $sql = "SELECT `permitted_faculty`, `project_limit` FROM `students` where `user_id` = ? LIMIT 1";
    $sth = $conn->prepare($sql);
    $sth->execute(array( $_SESSION['user_id']));
    $res = $sth->fetch(\PDO::FETCH_ASSOC);
    $avail_faculty = json_decode($res['permitted_faculty']);
    // var_dump( $avail_faculty);
    $avail_faculty = (array) $avail_faculty->faculty;
    //var_dump($_POST['faculty']);
    //var_dump( $avail_faculty);
    $pos = array_search($_POST['faculty'], $avail_faculty);
   // var_dump($pos);
    //if === is not used will cause trouble as if result is position 0 it is considered as false in ==
    if($pos===FALSE){
        die("Faculty hasn't permitted you");
    }
    var_dump($avail_faculty);
    unset($avail_faculty[$pos]);
    var_dump($avail_faculty);
    $arr = array();
    $arr['faculty'] = $avail_faculty; 
    $json = json_encode($arr);
    //var_dump($json);
    $sql = "UPDATE  `students` SET  `permitted_faculty` =  ? WHERE  `students`.`user_id` = ?;";
    $sth = $conn->prepare($sql);
    $sth->execute(array( $json,$_SESSION['user_id']));
    $res = $sth->fetch(\PDO::FETCH_ASSOC);