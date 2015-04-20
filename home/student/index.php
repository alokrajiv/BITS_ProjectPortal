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
            session_start();
            require '../../configs/db_config.php';
            $sql = "SELECT `permitted_faculty`, `project_limit` FROM `students` where `user_id` = ? LIMIT 1";
            $sth = $conn->prepare($sql);
            $sth->execute(array( $_SESSION['user_id']));
            $res = $sth->fetch();
            var_dump($res);
            
        ?>
    </body>
</html>
