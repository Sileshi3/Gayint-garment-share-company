<?php
ob_start();
include('connect.php');
$emailError='';
$passError='';
$prompt='<div class="alert alert-danger alert-dismissable">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-info"></i> Alert!</h4>
                    If you are new customer please REGISTER and if you have account please Login.
                  </div>';
 session_start();

	if (isset($_SESSION['customer'])!="") {
		header("Location: cart.php");
		exit;
	}
	$error = false;
	if( isset($_POST['btn-login']) ) {
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		if(empty($email)){
			$error = true;
			$emailError = "Please enter your email address.";
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		}
		if(empty($pass)){
			$error = true;
			$passError = "Please enter your password.";
		}
		if (!$error) {
			$password = hash('sha256', $pass);
			$res=mysql_query("SELECT Customer_ID,UserName,Password FROM customer WHERE Email='$email'");
			$row=mysql_fetch_array($res);
			$count = mysql_num_rows($res);
			if( $count == 1 && $row['Password']==$password ) {
				$_SESSION['customer'] = $row['Customer_ID'];
				header("Location: cart.php");
			} else {
				$errMSG = "Incorrect Credentials, Try again...";
			}
		}
	}
?>
<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
	<?php include 'header.php'; ?>
  <body class="no-trans">
    <div class="scrollToTop"><i class="icon-up-open-big"></i></div>
    <header class="header fixed clearfix navbar navbar-fixed-top">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
          <div class="header-left clearfix">
              <div class="logo smooth-scroll">
                <a href="#banner"><img id="logo" src="images/logo.PNG" alt="LGT"></a></div>
              <div class="site-name-and-slogan smooth-scroll">
                <div class="site-name"><a href="#banner">LGT</a></div>
                <div class="site-slogan">ላይ ጋይንት ጨርቃጨርቅ ፋብሪካ</div>
              </div></div></div>
          <div class="col-md-8">
            <div class="header-right clearfix">
              <div class="main-navigation animated">
                <nav class="navbar navbar-default" role="navigation">
                  <div class="container-fluid">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                    </div>
                    <div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1">
                      <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                         <li><a href="products.php">Products</a></li>
                        <li><a href="gallery.php">Gallary</a></li>
                        <li><a href="clients.php">Clients</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li class="active"><a href="login.php">Log In</a></li>
  </ul></div></div></nav></div></div></div></div></div></header>
		<script src="validation.js"></script>
		<link href="login.css" rel="stylesheet">

<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />

<link rel="stylesheet" href="login/css.css" type="text/css">
<link rel="stylesheet" href="login/bootstrap.css" type="text/css">
<link rel="stylesheet" href="login/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="login/css.css" type="text/css">
<script href="loginv/js/bootstrap.js" </script>
<script href="loginv/js/bootstrap.min.js" </script>
<script href="loginv/js/npm.js" </script>
<script src="login/js.js"></script>
	</head>
<body class="no-trans" style="background-color:silver;height:70%;width:110%;">
		<div class="scrollToTop"><i class="icon-up-open-big"></i></div>
<?php include 'header.php'; ?>
<div class="container" style="margin-top:100px;margin-bottom:20px;margin-left: 250px">
    	<div class="row">
			<div class="col-md-5 col-md-offset-2">
				<div class="panel panel-login">
					<div><div>
						<?php echo $prompt;?>
							<div class="col-xs-6">
								<a href="login.php" class="active" id="login-form-link">Login</a></div>
							<div class="col-xs-6">
								<a href="Register.php" id="register-form-link">Register</a>
							</div></div><hr></div>
<div id="login-form" class="panel-body">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    	<div class="col-md-12">
            <?php
			if (isset($errMSG)){ ?>
				<div class="form-group">
            	<div class="alert alert-danger">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
          <?php }	?>
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="email" name="email" class="form-control" placeholder="Your Email"   maxlength="40" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div><hr>
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-login">Sign In</button>
            </div>
        </div>
    </form>
    </div>














<!--div class="panel-body">
	<div class="row">
		<div class="col-lg-10">
			<form onsubmit="return login_form()" action="cart_login.php" id="login-form" name="login_form" method="post" style="display: block;">
				<div class="form-group">
                <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Your Email" value="">
                 <span id="username" style="color:red"></span></div>
				<div class="form-group" class="glyphicon glyphicon-lock">
				<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Your Password">
			   <span id="password" style="color:red"></span></div>
				<div class="form-group text-center">
				<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
					    <label for="remember" id="remember"> Remember Me</label></div>
				<div class="form-group">
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
					<input style="background-color:lightblue" type="submit" name="cart_login-submit" id="cart_login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="recover.php" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
    </div>
    </div>
</div-->
</div></div></div></div></body>
<?php include 'footer.php'; ?>
</html>
