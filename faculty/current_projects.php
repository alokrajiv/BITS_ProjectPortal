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
        <?php
                require '../configs/auto_config.php';
                session_start();
                $sql = "
                        SELECT * FROM  `users_data` JOIN `pp_projects` ON `ucid`=`student` WHERE  `faculty` =?
                        ";
                $sth = $conn->prepare($sql);
                $sth->execute(array($_SESSION['cached_users_data']['ucid']));
                $res = $sth->fetchall(PDO::FETCH_ASSOC);
                var_dump($_SESSION['cached_users_data']['ucid']);
                
        ?>
        <?php
                //LAKSHAY TOT EDIT
                echo '<table border="1">';
                $count = 1;
                foreach ($res as $key => $value) {
                        echo "<tr><td>$count</td>";
                        foreach ($value as $ikey => $ivalue) {
                                echo "<td>$ivalue</td>";
                        }
                        echo "</tr>";
                        $count++;
                }
                echo '</table>';
        ?>
    </body>
</html>
