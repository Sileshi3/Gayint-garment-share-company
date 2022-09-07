<?php
session_start();
include 'connect.php';
//$connection=mysql_connect('localhost','root','');
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
												 <li class="active"><a href="products.php">Products</a></li>
										<li ><a href="gallery.php">Gallary</a></li>
												<li><a href="clients.php">Clients</a></li>
												<li><a href="contact.php">Contact</a></li>
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
	<div style="padding-top:50px;padding-bottom:110px" class="container object-non-visible" data-animation-effect="fadeIn">
				<h1 id="services"  class="text-center title">Our Products</h1>
  <?php
 $result = mysql_query("SELECT * FROM product ORDER BY id ASC");
 if($result ==false) {
    var_dump(mysql_error());
}
 else if(mysql_num_rows($result) > 0)
               {
                     while($row = mysql_fetch_array($result))
                     {
                ?>
<div class="col-xs-3" style="margin-bottom: 20px; ">
<form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">
<?php
if($row["id"]==1){?>
<a href="threads.php"><img id="img_size" src="images/product/<?php echo $row["Image"]; ?>" class="img-responsive"/></a>
<?php
}
else if($row["id"]==2) {?>
<a href="kuta.php"><img id="img_size" src="images/product/<?php echo $row["Image"]; ?>" class="img-responsive"/></a>
<?php
}
else if($row["id"]==3) {?>
<a href="bedsheet.php"><img id="img_size" src="images/product/<?php echo $row["Image"]; ?>" class="img-responsive"/></a>
<?php
}
else if($row["id"]==4) {?>
<a href="abushema.php"><img id="img_size" src="images/product/<?php echo $row["Image"]; ?>" class="img-responsive"/></a>
<?php
}
else if($row["id"]==5) {?>
<a href="abujedie.php"><img id="img_size" src="images/product/<?php echo $row["Image"]; ?>" class="img-responsive"/></a>
<?php
}
else if($row["id"]==6) {?>
<a href="pillow.php"><img id="img_size" src="images/product/<?php echo $row["Image"]; ?>" class="img-responsive"/></a>
<?php
}
else if($row["id"]==7) {?>
<a href="rowtextile.php"><img id="img_size" src="images/product/<?php echo $row["Image"]; ?>" class="img-responsive"/></a>
<?php
}
?>
            <p class="text_align"><?php echo $row["Product_Name"]; ?></p>
            <p class="text_align">Price: <?php echo $row["Price"]; ?></p>
  <input type="hidden" name="quantity"  value="1" />
  <input type="hidden" name="hidden_name" value="<?php echo $row["Product_Name"]; ?>" />
  <input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>" />


   <input type="hidden" name="hidden_model" value="
   <?php echo $row["Product_Model"]; ?>" />
  <input type="hidden" name="hidden_avail" value="
  <?php echo $row["Availability"]; ?>" />
  <input class="wl_btn" type="submit" name="add_to_cart" style="margin-top:5px;"  value="Add to Cart" />
  <?php
if($row["id"]==1){?>
  <a href="threads.php"><img src="images/download.jpg" class="detail_align" style="width:50px;height:10px" /></a>
<?php
}
else if($row["id"]==2){?>
<a href="kuta.php"><img src="images/download.jpg" class="detail_align"
 style="width:50px;height:10px" /></a>
<?php
}
else if($row["id"]==3){?>
<a href="bedsheet.php"><img src="images/download.jpg" class="detail_align"
  style="width:50px;height:10px" /></a>
<?php
}
else if($row["id"]==4){?>
<a href="abushema.php"><img src="images/download.jpg" class="detail_align"
  style="width:50px;height:10px" /></a>
<?php
}
else if($row["id"]==5){?>
<a href="abujedie.php"><img src="images/download.jpg" class="detail_align"
 style="width:50px;height:10px" /></a>
<?php }
else if($row["id"]==6){?>
<a href="pillow.php"><img src="images/download.jpg" class="detail_align"
 style="width:50px;height:10px" /></a>
<?php
}
else if($row["id"]==7){?>
<a href="rowtextile.php"><img src="images/download.jpg" class="detail_align"
  style="width:50px;height:10px" /></a>
<?php
}
?>

                     </form>
                </div>
                <?php
                     }
              }
                ?>
<div style="text-align:right;margin-top:400px;margin-right:30px">
<a href="cart_login.php" class="button">Check Your Cart
<img style="margin-left:20px" src="images/shoppingcart.png"/></a>
</div>



 </div>
			</div></div>
	<?php include 'footer.php'; ?>
	</body>
</html>
