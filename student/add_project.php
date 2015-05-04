<?php $base_url = '..';  
            require $base_url.'/assets/template/header.php';
            require $base_url.'/assets/template/nav.php';
            require $base_url.'/configs/auto_config.php';
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
<?php
      require $base_url.'/assets/template/footer.php';
