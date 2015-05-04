<?php $base_url = '..';  
            require $base_url.'/assets/template/header.php';
            require $base_url.'/assets/template/nav.php';
            require $base_url.'/configs/auto_config.php';
            ?>
        <form method="POST" action="confirm_add_student.php">
            <input id="student_uhid" type="text" name="student_uhid">
            <button type="submit">SEARCH</button>
        </form>
        <?php
      require $base_url.'/assets/template/footer.php';
