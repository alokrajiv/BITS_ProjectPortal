<?php $base_url = '..';  
            require $base_url.'/assets/template/header.php';
            require $base_url.'/assets/template/nav.php';
            require $base_url.'/configs/auto_config.php';
                $sql = "
                        SELECT `prefix`,`fname`,`mname`,`lname` FROM  `users_data` LEFT JOIN `pp_invites` ON `ucid`=`student` WHERE `status`='LIVE' AND `faculty` =?
                        ";
                $sth = $conn->prepare($sql);
                $sth->execute(array($_SESSION['cached_users_data']['ucid']));
                $res = $sth->fetchall();
                
        ?>
        <?php
                //LAKSHAY TOT EDIT
                echo '<table border="1">';
                $count = 1;
                foreach ($res as $key => $value) {
                        echo "<tr><td>$count</td>";
                        $student_name = $value['prefix'].' '.$value['fname'].' '.$value['mname'].' '.$value['lname'];

                        echo "<td>$student_name</td>";
                        echo "</tr>";
                        $count++;
                }
                echo '</table>';
   
      require $base_url.'/assets/template/footer.php';
