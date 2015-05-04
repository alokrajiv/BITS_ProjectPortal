<?php $base_url = '..';  
            require $base_url.'/assets/template/header.php';
            require $base_url.'/assets/template/nav.php';
            require $base_url.'/configs/auto_config.php';
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
       <?php
      require $base_url.'/assets/template/footer.php';
