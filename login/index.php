<?php
  session_start();
  if(isset($_SESSION['user'])){
    header('location:../admin/home.php');
  }
?>
<?php include 'header.php'; ?>
<body class="hold-transition login-page">
<?php include 'head_bar.php'; 


//Display mesages
if(isset($_SESSION['error'])){
    echo "
      <div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h4><i class='icon fa fa-warning'></i> Error!</h4>
        ".$_SESSION['error']."
      </div>
    ";
    unset($_SESSION['error']);
  }
  if(isset($_SESSION['success'])){
    echo "
      <div class='alert alert-success alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h4><i class='icon fa fa-check'></i> Success!</h4>
        ".$_SESSION['success']."
      </div>
    ";
    unset($_SESSION['success']);
  }

?>
<div class="login-box">
  	<div class="login-logo">
  		<b>User login</b>
  	</div>
  	<div class="login-box-body">
    	<p class="login-box-msg">Sign in to start your session</p>
    	<form action="login.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="username" maxlength = 50 required autofocus>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" maxlength = 50 required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
		  <div class="form-group mb-5">
		  	<a href="../answer_username.php">Forgot password?</a>
		  </div>
      		<div class="row">
    			<div class="col-xs-12">
          			<button type="submit" class="btn btn-success btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
        		</div>
      		</div>
    	</form>
  	</div>
</div>
	
<?php include 'scripts.php' ?>
</body>
</html>