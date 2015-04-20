<?php
    session_start();
    require '../../../configs/db_config.php';
    $_POST['faculty'] = "1112";
    $sql = "SELECT `permitted_faculty`, `project_limit`, `projects_allotted` FROM `students` where `user_id` = ? LIMIT 1";
    $sth = $conn->prepare($sql);
    $sth->execute(array( $_SESSION['user_id']));
    $res = $sth->fetch(\PDO::FETCH_ASSOC);
    $avail_faculty = json_decode($res['permitted_faculty']);
    $old_lid=$res['projects_allotted'];
    // var_dump( $avail_faculty);
    $avail_faculty = (array) $avail_faculty->faculty;
    //var_dump($_POST['faculty']);
    //var_dump( $avail_faculty);
    $pos = array_search($_POST['faculty'], $avail_faculty);
   // var_dump($pos);
    //if === is not used will cause trouble as if result is position 0 it is considered as false in ==
    
    $arr= array();
    $not_found = TRUE;
    foreach ($avail_faculty as $key => $value) {
        if($value==$_POST['faculty']){
            $not_found = FALSE;
        }
        else{
            array_push($arr, $value);
        }
        
    }
    if($not_found){
        die("Faculty hasn't permitted you");
    }
    $export = array();
    $export['faculty']  = $arr;
    $json = json_encode($export);
   

    
    $sql = "INSERT INTO `projects` (`student_id`, `faculty_id`, `details`) VALUES ( ? , ? , ?); ";
    $sth = $conn->prepare($sql);
    $sth->execute(array( $_SESSION['user_id'], $_POST['faculty'], "sadsdfdf"));
    $lid = ($conn->lastInsertId());
    $new_lid = rtrim($old_lid.",".$lid, ',');
    $sql = "UPDATE  `students` SET  `permitted_faculty` =  ? , `projects_allotted` =  ? WHERE  `students`.`user_id` = ?;";
    $sth = $conn->prepare($sql);
    $sth->execute(array( $json, $new_lid ,$_SESSION['user_id']));
    $res = $sth->fetch(\PDO::FETCH_ASSOC);