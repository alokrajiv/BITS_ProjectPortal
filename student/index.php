<?php $base_url = '..';  
            require $base_url.'/assets/template/header.php';
            require $base_url.'/assets/template/nav.php';
            require $base_url.'/configs/auto_config.php';
                 $sql = "
                        SELECT `prefix`,`fname`,`mname`,`lname`,`invite_id` FROM  `users_data` LEFT JOIN `pp_invites` ON `ucid`=`faculty` WHERE `status`='LIVE' AND `student` =?
                        ";
                $sth = $conn->prepare($sql);
                $sth->execute(array($_SESSION['cached_users_data']['ucid']));
                $res = $sth->fetchall();
                echo '<ul>';
                $count = 1;
                foreach ($res as $key => $value) {
                        $faculty_name = $value['prefix'].' '.$value['fname'].' '.$value['mname'].' '.$value['lname'];
                        $invite_id = $value['invite_id'];
                        echo "<li><a href='add_project.php?invite_id=$invite_id'>$faculty_name</a></li>";
                        $count++;
                }
                echo '</ul>';
        
      require $base_url.'/assets/template/footer.php';
