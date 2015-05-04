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
                        SELECT * FROM  `pp_invites` WHERE  `status`='LIVE' AND `invite_id` =?
                        ";
                $sth = $conn->prepare($sql);
                $sth->execute(array($_GET['invite_id']));
                $res = $sth->fetch();
                if($res===FALSE){
                        echo '<h1>';
                        header('HTTP/1.1 404 Not Found', true, 404);
                        die("HTTP/1.1 404 Not Found");
                }
                else if($res ["student"]!=$_SESSION['cached_users_data']['ucid']){
                        echo '<h1>';
                        header('HTTP/1.1 401 Unauthorized', true, 401);
                        die("HTTP/1.1 401 Unauthorized");
                }
        ?>
        <form action="handles/add_project_handle.php" method="post">
                <input type="hidden" id="invite_id" name="invite_id" value="<?=$_GET ["invite_id"]?>">            
                <input type="hidden" id="student" name="student" value="<?=$_SESSION['cached_users_data']['ucid']?>">
                <input type="hidden" id="faculty" name="faculty" value="<?=$res ["faculty"]?>">
                <br>Comp Code:<input type="text" id="comp_code" name="comp_code" >
                <br>Course No:<input type="text" id="course_no" name="course_no" >
                <br>Project Title:<input type="text" id="project_title" name="project_title" >
                <br>Course Title:<input type="text" id="course_title" name="course_title" >
                <br>Scope:<textarea id="scope" name="scope" ></textarea>
                <br><button type="submit">SUBMIT</button>
        </form>
    </body>
</html>
