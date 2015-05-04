<?php $base_url = '.';  
            require $base_url.'/assets/template/header.php';
            require $base_url.'/assets/template/nav.php';
                require './configs/auto_config.php';
                session_destroy();
                header('Location: logout_success.php');
                echo "<h3>Logged out.</h3>";
                
            require $base_url.'/assets/template/footer.php';