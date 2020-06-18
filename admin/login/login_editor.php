<?php
  include("../template/login_header.php");
?>
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="" method="post">
		<h3 class="form-title">Sign In</h3>
		   <?php
		      if(isset($message))
		      {
		        echo '<code>'.$message.'</code>';	  
		      }
		   ?>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Enter any username and password. </span>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="User name" name="user_name"  value="<?=$_REQUEST['user_name']?>"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="User password" name="user_password"  value="<?=$_REQUEST['user_password']?>"/>
		</div>
		<div class="form-actions">
		   <input type="hidden" name="cmd" value="login">
			<button type="submit" class="btn btn-success uppercase">Login</button>
			<label class="rememberme check">
			<input type="checkbox" name="remember" value="1"/>Remember </label>
		</div>
		
	</form>
	<!-- END LOGIN FORM -->	
</div>
<?php
  include("../template/login_footer.php");
?>
