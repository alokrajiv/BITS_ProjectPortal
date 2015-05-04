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
        <form method="post" action="handles/password_reset_handle.php">
            <input type="hidden" name="reset_id" value="<?php echo $_GET['reset_id']; ?>">
            <input id="new_password" type="password" name="new_password" >
            <input id="confirm_new_password" type="password" name="confirm_new_password">
            <button type="submit">CONFIRM RESET</button>
        </form>
    </body>
</html>
