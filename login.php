<?php $base_url = '.';  

require $base_url.'/assets/template/header.php';
require $base_url.'/assets/template/nav.php';
session_start();
if(isset($_SESSION['cached_users_data'])){
     if( substr($_SESSION['cached_users_data']['designation'], 0, 3) == 'STU'){
        header("Location: /BITS_ProjectPortal/student/");
    }
    else  if( substr($_SESSION['cached_users_data']['designation'], 0, 3) == 'FAC'){
        header("Location: /BITS_ProjectPortal/faculty/");
    }
 else {
        die("unknown session data");
    }
}
?>
<script src="./assets/js/custom.js"></script>
<link href="./assets/css/custom.css" rel="stylesheet" type="text/css" />
<section id="login">
    <div class="container">
    	<div class="row">
    	    <div class="col-xs-12">
        	    <div class="form-wrap">
                <h1>Log in with your BITS ID/PSRN</h1>
                <form role="form" action="./handles/login_handle.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <input type="text" name="login-id" id="login-id" class="form-control" placeholder="Enter full BITS ID or PSRN" title="Format: 2014A1PS001U or 1112">
                        </div>
                        <div class="form-group">
                            <input type="password" name="login-password" id="key" class="form-control" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <span class="character-checkbox" onclick="showPassword()"></span>
                            <span class="label">Show password</span>
                        </div>
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in">
                    </form>
                    <a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a>
                    <hr>
        	    </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">Recovery password</h4>
			</div>
			<div class="modal-body">
				<p>Type your email account</p>
				<input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-custom">Recovery</button>
			</div>
		</div> <!-- /.modal-content -->
	</div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p>Page © - 2015</p>
                <p>Powered by <strong><a href="http://www.alokrajiv.com" target="_blank">alokrajiv.com</a></strong></p>
            </div>
        </div>
    </div>
</footer>

  <?php          require $base_url.'/assets/template/footer.php';