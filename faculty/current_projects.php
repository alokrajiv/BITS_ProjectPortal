<?php $base_url = '..';  
            require $base_url.'/assets/template/header.php';
            require $base_url.'/assets/template/nav.php';
            require $base_url.'/configs/auto_config.php';
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

      require $base_url.'/assets/template/footer.php';
