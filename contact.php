<?php
$connection=mysql_connect('localhost','root','');
$success="";
if(!$connection){
  die ('Could not connected'.mysql_error());
}
else{
mysql_select_db('lgt');
$id=rand(2,8);
 if(isset($_POST['send'])){
$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];
$date= mktime();
$sql="INSERT INTO feadbacks (name,email,date,message) VALUES ('$name','$email','$date','$message')";
$snd=mysql_query($sql,$connection);
if ($snd) {
'<a href="contact.php">';
$success='<div style="color:green;font-weight:bolder;background-color:lightblue;font-size:18px" >Feedback sent successfull </div>';
}
else{
$success='<div style="color:green;font-weight:bolder;background-color:lightblue;font-size:18px" >Not successfull </div>'.mysql_error();
header("contact.php");
}
}
}
?>
<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
	<?PHP include 'header.php'; ?>
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
								<div class="site-name"><a href="#banner"><i style="font-family:Times New Roman,Times,serif">LGT</i></a></div>
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
										     <li ><a href="gallery.php">Gallary</a></li>
												<li><a href="clients.php">Clients</a></li>
												<li class="active"><a href="contact.php">Contact</a></li>
												<li><a href="login.php">Log In</a></li>
	</ul></div></div></nav></div></div></div></div></div></header>
	<div id="banner" class="banner">
		<div class="banner-image"></div>
		<div class="banner-caption">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 object-non-visible" data-animation-effect="fadeIn">
						<p class="lead text-center"> </p>
					</div></div></div></div></div>
	<footer id="footer">
			<div class="footer section">
				<div class="container">
					<h1 class="title text-center" id="contact">Contact Us</h1>
					<div class="space"></div>
					<div class="row">
						<div class="col-sm-6">
							<div class="footer-content">
								<p class="large" style="font-family:Times New Roman,Times,serif;margin-left:50px;"><strong><i>Contact Information</i></strong></p>
					<ul class="list-icons">
						<li><i class="fa fa-map-marker pr-10"></i>Address:
						 <i class="fa fa-map-marker pr-10"></i>Gaynt Town,Amhara Ethiopia</li>
						<li><i class="fa fa-map-marker pr-10"></i>Mail: corporate@laygaynttextile.com</li>
						<li><i class="fa fa-phone pr-10"></i>Mobile: General Manager +2515823434</li>
					    <li><i class="fa fa-fax pr-10"></i>Phone: +2515823435</li>
								</ul>
</div></div>
						<div class="col-sm-6">
							<div class="footer-content">
								<form role="form" id="footer-form" action="contact.php" method="post">
									<div class="form-group has-feedback">
										<div style="margin-right:60px;text-align: center;height:40px">
   				            <?php echo $success; ?>
				            </div>
										<label class="sr-only" for="name">Name</label>
										<input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
										<i class="fa fa-user form-control-feedback"></i>
									</div>
									<div class="form-group has-feedback">
										<label class="sr-only" for="email">Email address</label>
										<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
										<i class="fa fa-envelope form-control-feedback"></i>
									</div>
									<div class="form-group has-feedback">
										<label class="sr-only" for="message">Message</label>
										<textarea class="form-control" rows="8" id="message2" placeholder="Message" name="message" required></textarea>
										<i class="fa fa-pencil form-control-feedback"></i>
									</div>
									<button type="submit"  name="send" value="Send" class="btn btn-default">SEND</button>
								</form></div></div></div></div></div>
<?php include 'footer.php'; ?>
	</body>
</html>
