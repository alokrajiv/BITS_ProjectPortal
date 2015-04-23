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
        <script src="../../assets/js/jquery.min.js"></script>
<link href="../../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="../../assets/js//bootstrap.min.js"></script>
    </head>
    <body>
        <?php
            session_start();
            require '../../configs/db_config.php';
            $sql = "SELECT `permitted_faculty`, `project_limit` FROM `students` where `user_id` = ? LIMIT 1";
            $sth = $conn->prepare($sql);
            $sth->execute(array( $_SESSION['user_id']));
            $res = $sth->fetch(\PDO::FETCH_ASSOC);
            $avail_faculty = json_decode($res['permitted_faculty']);
            $avail_faculty = $avail_faculty->faculty;
        ?>
        <form action="add_project.php" method="post">
            <select name="faculty">
                <?php
                        foreach ($avail_faculty as $value) {
                            echo "<option value=\"$value\">$value</option>";
                        }
                ?>
            </select>
            <button type="submit" class="btn btn-primary">PROCEED</button>
        </form>
    </body>
</html>
