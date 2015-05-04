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
        // put your code here
        ?>
        <form action="handles/add_project_handle.php" method="post">
            <input type="hidden" name="faculty" value="<?php echo $_POST['faculty']; ?>">
            <textarea name="details"></textarea>
            <button type="submit">SUBMIT</button>
        </form>
    </body>
</html>
