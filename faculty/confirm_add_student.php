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
                $student_uhid = $_POST['student_uhid'];
                $sql = "
                        SELECT * FROM  `users_data` WHERE  `uhid` LIKE  ? ;
                        ";
                $sth = $conn->prepare($sql);
                $sth->execute(array($student_uhid));
                $res = $sth->fetch();
                $student_name = $res['prefix'].' '.$res['fname'].' '.$res['mname'].' '.$res['lname'];
                $student_ucid = $res['ucid'];
        ?>
        The Student's name is <br>
        <h3><?=$student_name ?></h3>
        <form method="post" action="./handles/add_student_handle.php">
            <input type="hidden" name="student_ucid" value="<?=$student_ucid ?>">
            <button type="submit">CONFIRM</button>
        </form>
    </body>
</html>
