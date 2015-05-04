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
    </head>
    <body>
        Click:<br>
        <?php
                session_start();
                require '../configs/auto_config.php';
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
        ?>
    </body>
</html>
