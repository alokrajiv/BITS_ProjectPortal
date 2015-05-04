<?php
    session_start();
    
    var_dump($_SESSION['user_type']);
    if ($_SESSION['user_type'] == 'stu') {
        header("Location: student/");
    } 
    else if ($_SESSION['user_type'] == 'fac') {
        header("Location: faculty/");
    } 
    else if ($_SESSION['user_type'] == 'adm') {
        header("Location: admin/");
    }
    var_dump($_SESSION['user_type'] );
