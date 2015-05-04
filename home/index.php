<?php
session_start();

if(isset($_SESSION['cached_users_data'])){
     if( substr($_SESSION['cached_users_data']['designation'], 0, 3) == 'STU'){
        header("Location: /BITS_ProjectPortal/student/");
    }
    else  if( substr($_SESSION['cached_users_data']['designation'], 0, 3) == 'FAC'){
        header("Location: /BITS_ProjectPortal/faculty/");
    }
    else{
    header('Location: /BITS_ProjectPortal/');
    }
}
